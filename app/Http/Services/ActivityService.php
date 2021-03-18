<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\Institution;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;

class ActivityService
{

  public function index(
    string $project_id     = null,
    string $institution_id = null,
    string $municipio_id   = null,
    string $parroquia_id   = null,
    string $gobernador     = null,
    string $municipio_code = null
  ) {

    $activities = Activity::with(
      'project.program.institution',
      'parroquia.municipio',
      'images'
    );

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

  public function store(array $activityData, array $images)
  {
    DB::beginTransaction();
    $activity = Activity::create(array_merge(
      $activityData,
      ["gobernador" => $activityData["gobernador"] == 'SI']
    ));
    $imagesToSave = [];
    foreach ($images as $image) {
      $storedImage = $image->store('images');
      array_push($imagesToSave, ["path" => $storedImage]);
    }
    $activity->images()->createMany($imagesToSave);
    DB::commit();
    return $activity;
  }

  public function countActivitiesByMunicipio($municipio_code)
  {
    $activities = DB::table('activities as act')
      ->join('parroquias as parr', 'parr.id', 'act.parroquia_id')
      ->join('municipios as mun', 'mun.id', 'parr.municipio_id')
      ->join('projects as proj', 'proj.id', 'act.project_id')
      ->join('investment_sub_area_project as subarea_pivot', 'subarea_pivot.project_id', 'proj.id')
      ->join('investment_sub_areas as subarea', 'subarea.id', 'subarea_pivot.investment_sub_area_id')
      ->join('investment_areas as area', 'area.id', 'subarea.investment_area_id');

    $activities = $activities
      ->where('mun.code', '=', $municipio_code)
      ->select(
        DB::raw('COUNT(act.id) as activity_count'),
        DB::raw('area.name as area_name'),
        DB::raw('area.code as area_code'),
      )->groupBy('area_name', 'area_code')
      ->get();
    $municipio =  Municipio::where('code', $municipio_code)->first();
    return ["count" => $activities, "municipio" => $municipio];
  }
}
