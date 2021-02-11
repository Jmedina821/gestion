<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectService;
use App\Http\Traits\ApiCrud;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ApiCrud;

    private $projectService;

    public function __construct()
    {
        $this->projectService = new ProjectService;
    }

    public function index(Request $request)
    {
        return $this->projectService->index($request->program_id, $request->institution_id);
    }

    public function store(Request $request)
    {
        return $this->projectService->store($request->all());
    }

    public function model()
    {
        return Project::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'program_id' => 'required',
            'measurement_id' => 'required',
            'project_status_id' => 'required',
            'measurement_value' => 'required',
            'is_planified' => 'required',
            'init_date' => 'required'
        ];
    }
}
