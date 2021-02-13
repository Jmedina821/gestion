<?php

namespace App\Http\Services;

use App\Models\Institution;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function store(array $projectData)
    {
        DB::beginTransaction();
        $investment_sub_areas = $projectData["investment_sub_areas"];
        $budgets = $projectData["budgets"];
        $project = Project::create($projectData);
        $project->investmentSubAreas()->attach($investment_sub_areas);
        $project->budgets()->createMany($budgets);
        DB::commit();
        return $project;
    }

    public function index(
        string $program_id = null,
        string $institution_id = null,
        array $investment_areas = null,
        string $project_status_id = null,
        bool $is_planified = null
    ) {
        $projects = Project::with('program', 'investmentSubAreas', 'measurement', 'project_status', 'budgets.budgetSource');

        if (isset($program_id)) {
            $projects = $projects->where('program_id', $program_id);
        }

        if (isset($institution_id)) {
            $projects = $projects->whereHas('program', function ($q) use ($institution_id) {
                $institution = Institution::find($institution_id);
                if (!isset($institution->parent_id)) {
                    $q->whereIn('institution_id', $institution->children()->pluck('id') ?? []);
                } else {
                    $q->where('institution_id', $institution_id);
                }
            });
        }

        if (isset($investment_areas)) {
            $projects = $projects->whereHas('investmentAreas', function ($q) use ($investment_areas) {
                $q->whereIn('investment_areas.id', $investment_areas);
            });
        }

        if (isset($project_status_id)) {
            $projects = $projects->where('project_status_id', $project_status_id);
        }

        if (isset($is_planified)) {
            $projects = $projects->where('is_planified', $is_planified);
        }

        return $projects->get();
    }
}
