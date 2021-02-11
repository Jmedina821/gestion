<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectService;
use App\Http\Traits\ApiCrud;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
{
    use ApiCrud;
    private $projectStatusService;

    public function __construct()
    {
        $this->projectStatusService = new ProjectService;
    }
    public function model()
    {
        return ProjectStatus::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
            'is_final' => 'required'
        ];
    }
}
