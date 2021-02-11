<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\Institution;
use Illuminate\Support\Facades\DB;

class ActivityService
{

    public function index(
        string $project_id = null,
        string $institution_id = null,
        string $municipio_id = null,
        string $parroquia_id = null,
        string $gobernador = null
    ) {
        
        $activities = Activity::with('project.program.institution', 'parroquia.municipio');

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

        if (isset($municipio_id)) {
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
        foreach ($images as $image) {
            $image->store('images');
        }
        $activity = Activity::create(array_merge(
            $activityData,
            ["gobernador" => $activityData["gobernador"] == 'SI']
        ));
        DB::commit();
        return $activity;
    }
}
