<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivityService;
use App\Http\Traits\ApiCrud;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    use ApiCrud;

    private $activityService;

    public function __construct()
    {
        $this->activityService = new ActivityService;
    }

    public function model()
    {
        return Activity::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
            "project_id" => 'required',
            "parroquia_id" => 'required',
            "address" => 'required',
            "init_date" => 'required',
            "estimated_population" => 'required',
            "benefited_population" => 'required',
        ];
    }
}
