<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\Institution;
use App\Models\Municipio;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityService
{

  public function index(
    string $project_id      = null,
    string $institution_id  = null,
    string $municipio_id    = null,
    string $parroquia_id    = null,
    string $gobernador      = null,
    string $municipio_code  = null,
    array $bulk_municipios  = null,
    array $bulk_institution = null,
    array $dateRange        = null,
    string $project_status_id = null
  ) {

    $activities = Activity::with(
      'project.program.institution',
      'parroquia.municipio',
      'images',
      'project.investmentSubAreas.investmentArea'
    );

    if (isset($dateRange)) {
      $activities = $activities->where('init_date', '>=', Carbon::parse($dateRange[0]))
        ->where('end_date', '<=', Carbon::parse($dateRange[1]));
    }

    if (isset($project_status_id)) {
      $activities = $activities->whereHas('project', function ($q) use ($project_status_id) {
        $q->where('project_status_id', $project_status_id);
      });
    }

    if (isset($bulk_institution) && sizeof($bulk_institution) > 0) {
      $activities = $activities->whereHas('project.program.institution', function ($q) use ($bulk_institution) {
        $q->whereIn('parent_id', $bulk_institution);
      });
    }

    if (isset($bulk_municipios) && sizeof($bulk_municipios) > 0) {
      $activities = $activities->whereHas('parroquia', function ($q) use ($bulk_municipios) {
        $q->whereIn('municipio_id', $bulk_municipios);
      });
    }

    if (isset($project_id)) {
      $activities = $activities->where('project_id', '=', $project_id);
    }

    if (isset($institution_id)) {
      $activities = $activities->whereHas('project.program', function ($q) use ($institution_id) {
        $institution = Institution::find($institution_id);
        if (!isset($institution->parent_id)) {
          $q->whereIn('institution_id', $institution->children()->pluck('id') ?? []);
        } else {
          $q->where('institution_id', $institution_id);
        }
      });
    }

    if (isset($municipio_id) || isset($municipio_code)) {
      if (isset($municipio_code)) {
        $municipio_id = Municipio::where('code', $municipio_code)->first()->id;
      }
      $activities = $activities->whereHas('parroquia', function ($q) use ($municipio_id) {
        $q->where('municipio_id', $municipio_id);
      });
    }

    if (isset($parroquia_id)) {
      $activities = $activities->where('parroquia_id', '=', $parroquia_id);
    }
    if (isset($gobernador) && $gobernador != 'TODOS') {
      $activities = $activities->where('gobernador', '=', $gobernador == "SI");
    }

    return $activities->get();
  }

  public function store(array $activityData, array $images = null)
  {
    DB::beginTransaction();
    $activity = Activity::create(array_merge(
      $activityData,
      ["gobernador" => $activityData["gobernador"] == 'SI']
    ));
    $imagesToSave = [];
    if (isset($images)) {
      foreach ($images as $image) {
        $storedImage = $image->store('images');
        array_push($imagesToSave, ["path" => $storedImage]);
      }
      $activity->images()->createMany($imagesToSave);
    }

    DB::commit();
    return $activity;
  }

  public function update( string $activity_id ,array $activityData, array $images = null)
  {
    DB::beginTransaction();
    $activity = Activity::find($activity_id);
    $activity->update(array_merge(
      $activityData,
      ["gobernador" => $activityData["gobernador"] == 'SI']
    ));
    $imagesToSave = [];
    if (isset($images)) {
      foreach ($images as $image) {
        $storedImage = $image->store('images');
        array_push($imagesToSave, ["path" => $storedImage]);
      }
      $activity->images()->createMany($imagesToSave);
    }

    DB::commit();
    return $activity;
  }

  public function countAllBySecretary($secretary_id, $municipio_code)
  {

    $parent = Institution::where('code', $secretary_id)->get()->first();
    $municipio = Municipio::where('code', $municipio_code)->get()->first();

    $programs = Program::with('projects', 'institution')
      ->whereHas('institution', function ($q) use ($parent) {
        return $q->whereIn('id', $parent->children()->pluck('id'));
      })->whereHas('projects.activities.parroquia', function ($q) use ($municipio) {
        return $q->where('municipio_id', $municipio->id);
      })->get();

    $projects = array_reduce($programs->toArray(), function ($carry, $program) {
      $carry = $carry + $program["project_count"] ?? 0;
      return $carry;
    });

    $activities = 0;

    foreach ($programs as $program) {
      $activities += array_reduce($program->projects->toArray(), function ($carry, $project) {
        $carry += $project["total_activities"];
        return $carry;
      });
    }

    return [
      "municipio" => $municipio,
      "institution" => $parent,
      "programs" => sizeof($programs),
      "projects" => $projects ?? 0,
      "activities" => $activities
    ];
  }

  public function countActivitiesByMunicipio($municipio_code)
  {
    $activities = DB::table('activities as act')
      ->leftJoin('parroquias as parr', 'parr.id', 'act.parroquia_id')
      ->leftJoin('municipios as mun', 'mun.id', 'parr.municipio_id')
      ->leftJoin('projects as proj', 'proj.id', 'act.project_id')
      ->leftJoin('programs as prog', 'prog.id', 'proj.program_id')
      ->leftJoin('institutions as inst', 'inst.id', 'prog.institution_id')
      ->leftJoin('investment_sub_area_project as subarea_pivot', 'subarea_pivot.project_id', 'proj.id')
      ->leftJoin('investment_sub_areas as subarea', 'subarea.id', 'subarea_pivot.investment_sub_area_id')
      ->leftJoin('investment_areas as area', 'area.id', 'subarea.investment_area_id');

    $activities = $activities
      ->where('mun.code', '=', $municipio_code)
      ->select(
        DB::raw('COUNT(act.id) as activity_count'),
        DB::raw('inst.parent_id as parent_id'),
      )->groupBy('parent_id')
      ->get()
      ->unique('act.id');

    collect($activities)->map(function ($act) {
      $act->parent = Institution::find($act->parent_id);
    });

    $parent_ids_lt1 = $activities->pluck('parent_id');
    $empties = Institution::whereNotIn('id', $parent_ids_lt1)
      ->whereNull('parent_id')
      ->get()
      ->map(function ($i) {
        $i->activity_count = 0;
        $i->parent_id = $i->id;
        $i->parent = $i;
        return $i;
      });
    $municipio =  Municipio::where('code', $municipio_code)->first();
    return ["count" => array_merge($activities->toArray(), $empties->toArray()), "municipio" => $municipio];
  }
}
