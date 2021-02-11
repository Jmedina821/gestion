<?php

namespace App\Http\Services;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function store(array $projectData)
    {
        DB::beginTransaction();
        $investment_areas = $projectData["investment_areas"];
        $budgets = $projectData["budgets"];
        $project = Project::create($projectData);
        $project->investmentAreas()->attach($investment_areas);
        $project->budgets()->createMany($budgets);
        DB::commit();
        return $project;
    }

    public function index(string $program_id = null, string $institution_id = null)
    {
        $projects = Project::with('program', 'investmentAreas', 'measurement', 'project_status', 'budgets.budgetSource');
        if (isset($program_id)) {
            $projects = $projects->where('program_id', $program_id);
        }
        if (isset($institution_id)) {
            $projects = $projects->where('institution_id', $institution_id);
        }
        return $projects->get();
    }
}
