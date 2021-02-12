<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivityService;
use App\Http\Traits\ApiCrud;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{

    use ApiCrud;

    private $activityService;

    public function __construct()
    {
        $this->activityService = new ActivityService;
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), $this->validationRules())->validate();
        return $this->activityService->store($request->all(), $request->file('images'));
    }

    public function index(Request $request)
    {
        return $this->activityService->index(
            $request->project_id,
            $request->institution_id,
            $request->municipio_id,
            $request->parroquia_id,
            $request->gobernador
        );
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
            "images.*" => 'mimes:png,jpg,jpeg'
        ];
    }
}
