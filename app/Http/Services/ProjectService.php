<?php

namespace App\Http\Services;

use App\Models\Institution;
use App\Models\Project;
use App\Models\Budget;
use App\Models\Activity;
use App\Models\Observation;
use App\Models\Timeline;
use App\Models\UpdateType;
use Illuminate\Support\Facades\Auth;
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
    ) {
        $project = Project::where('id', '=', $project_id)->with(
            'program',
            'investmentSubAreas',
            'measurement_unit',
            'project_status',
            'budgets.budgetSource'
        );
        $project->update([
            "project_status_id" => $project_status_id,
        ]);
        return $project->get()->first();
    }

    public function modifyCulminationDate(
        array $modify_culmination_data
    ){
        $project_id = $modify_culmination_data["project_id"];
        $new_date = $modify_culmination_data["modified_culmination_date"];
        $description = $modify_culmination_data["observation"];

        $project = Project::where('id', '=', $project_id)->get()->first();

        DB::begintransaction();

        $observation = new Observation(['description' => $description]);

        $project->modified_culmination_dates()->create([
            'modified_date' => $new_date,
        ])->observation->save($observation);

        DB::commit();

        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_date')->get()->first();
            
        return $project;
    }

    public function increaseGoals(
        array $increase_goals_data
    ) {
        $project_id = $increase_goals_data["project_id"];
        $measurement = $increase_goals_data["measurement"];

        DB::beginTransaction();
        $project = Project::where('id', '=', $project_id)->get()->first();
        $project->measurement_unit()->syncWithoutDetaching($measurement);

        DB::commit();

        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_date')->get()->first();

        return $project;
    }

    public function increaseBudget(array $increase_budget_data)
    {

        $user = Auth::user();

        $project_id = $increase_budget_data["project_id"];
        $value =  $increase_budget_data["value"];
        $dollar_value = $increase_budget_data["dollar_value"];
        $budget_source_id = $increase_budget_data["budget_source_id"];
        $description = $increase_budget_data["observation"];


        DB::beginTransaction();

        $previous_budget = Budget::where('project_id', '=', $project_id)->sum('value');

        $budget = Budget::create([
            "project_id" => $project_id,
            "value" => $value,
            "dollar_value" => $dollar_value,
            "budget_source_id" => $budget_source_id,
            "is_budget_increase" => True,
        ]);

        $updated_budget = Budget::where('project_id', '=', $project_id)->sum('value');

        $observation = new Observation(['description' => $description]);

        $budget->observation()->save($observation);

        DB::commit();

        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_date')->get()->first();

        $project->timeline()->create([
            "previous_value" => $previous_budget,
            "current_value" => $updated_budget,
            "user_id" => $user->id,
            "update_type_id" => UpdateType::where('name', '=', 'Aumento de presupuesto (Proyecto)')->get()->first()->id,
        ])->observation()->create(['description' => $description]);

        return $project;
    }

    public function index(
        string $program_id = null,
        string $institution_id = null,
        array $investment_areas = null,
        string $project_status_id = null,
        bool $is_planified = null
    ) {
        $projects = Project::with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource', 'budgets.observation', 'timeline.observation');

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
        $budgets = Budget::where('project_id', '=', $id)->get();

        $total_budget = $budgets->sum('value');

        $activities_cost = Activity::where('project_id', '=', $id)->get();

        $activities_total_cost = $activities_cost->sum('budget_cost');

        $available_budget = $total_budget - $activities_total_cost;

        return $available_budget;
    }
}
