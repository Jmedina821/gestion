<?php

namespace App\Http\Services;

use App\Models\Institution;
use App\Models\Project;
use App\Models\Budget;
use App\Models\Activity;
use App\Models\Observation;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function store(array $projectData)
    {
        DB::beginTransaction();
        $investment_sub_areas = $projectData["investment_sub_areas"];
        $budgets = $projectData["budgets"];
        $measurement = $projectData["measurement_units"];
        $project = Project::create($projectData);
        $project->investmentSubAreas()->attach($investment_sub_areas);
        $project->budgets()->createMany($budgets);
        $project->measurement_unit()->syncWithoutDetaching($measurement);
        DB::commit();
        return $project;
    }

    public function updateProjectStatus(
        string $project_id,
        string $project_status_id = null
    ){
        $project = Project::where('id','=',$project_id)->with('program',
         'investmentSubAreas',
         'measurement_unit',
         'project_status',
         'budgets.budgetSource');
        $project->update([
            "project_status_id" => $project_status_id,
        ]);
        return $project->get()->first();
    }

    public function increaseBudget(array $increase_budget_data){

        $project_id = $increase_budget_data["project_id"];
        $value =  $increase_budget_data["value"];
        $budget_source_id = $increase_budget_data["budget_source_id"];
        $description = $increase_budget_data["observation"];

        DB::beginTransaction();

        $budget = Budget::create([
            "project_id" => $project_id,
            "value" => $value,
            "budget_source_id" => $budget_source_id,
            "is_budget_increase" => True,
        ]);

        /* $observation = new Observation([ 'description' => $description ]);

        $budget->observation()->save($observation); */

        DB::commit();
        
        $project = Project::where('id','=',$project_id)->with('program','investmentSubAreas','measurement_unit', 'project_status','budgets.budgetSource')->get()->first();

        return $project;
    }

    public function index(
        string $program_id = null,
        string $institution_id = null,
        array $investment_areas = null,
        string $project_status_id = null,
        bool $is_planified = null
    ) {
        $projects = Project::with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource');

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

    public function availableBudget($id)
    {
        $budgets = Budget::where('project_id','=',$id)->get();

        $total_budget = $budgets->sum('value');

        $activities_cost = Activity::where('project_id','=',$id)->get();

        $activities_total_cost = $activities_cost->sum('budget_cost');

        $available_budget = $total_budget - $activities_total_cost;

        return $available_budget;
        
    }
}
