<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivityService;
use App\Http\Services\ProjectService;
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
        $this->projectService = new ProjectService;
    }

    public function activityCountByMunicipio(Request $request)
    {
        return $this->activityService->countActivitiesByMunicipio($request->municipio_code);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), $this->validationRules())->validate();

        $activity_cost = $request->budget_cost;

        $available_budget = $this->projectService->availableBudget($request->project_id);

        if($available_budget < $activity_cost){
            return response()->json(["status" => "failed" , "message" => "El costo de la actividad es mayor que el presupuesto disponible"],401);
        }

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
