<?php

namespace App\Http\Services;

use App\Models\Activity;

class ActivityService
{
    public function store(array $activityData)
    {
        $activity = Activity::create(array_merge(
            $activityData,
            ["gobernador" => $activityData["gobernador"] == 'SI']
        ));
        return $activity;
    }
}
