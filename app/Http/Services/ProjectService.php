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
        string $project_status_id = null,
        string $observation
    ) {

        $user = Auth::user();
        $observation = new Observation([ 'description' => $observation]);

        DB::beginTransaction();
        $project = Project::where('id', '=', $project_id)->with('project_status');
        
        $last_value = $project->get()->first()->project_status->name;
        
        $project->update([
            "project_status_id" => $project_status_id,
        ]);

        $project = writeTimeline(
            $project_id,
            $user,
            $observation,
            "project_status",
            null,
            $last_value
        );

        DB::commit();

        return $project;
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

        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_dates')->get()->first();
            
        return $project;
    }

    public function increaseGoals(
        array $increase_goals_data
    ) {
        $user = Auth::user();
        $project_id = $increase_goals_data["project_id"];
        $measurement = $increase_goals_data["measurement"];
        $obseration = $increase_goals_data["observation"];
        $updated_project = new Project();

        DB::beginTransaction();

        $project = Project::where('id', '=', $project_id)->get()->first();
        $project->measurement_unit()->syncWithoutDetaching($measurement);

        /* foreach($measurement as $measure)
        {
            $updated_project = writeTimeline(
                $project_id,
                $user,
                $obseration,
                "project_goal",
                $measure
            );
        } */

        

        DB::commit();



        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_dates')->get()->first();

        return $project;
    }

    public function increaseBudget(array $increase_budget_data)
    {

        $user = Auth::user();

        $project_id = $increase_budget_data["project_id"];
        $value =  $increase_budget_data["value"];
        $dollar_value = $increase_budget_data["dollar_value"];
        $budget_source_id = $increase_budget_data["budget_source_id"];
        $observation = $increase_budget_data["observation"];

        $project = 

        DB::beginTransaction();

        $budget = Budget::create([
            "project_id" => $project_id,
            "value" => $value,
            "dollar_value" => $dollar_value,
            "budget_source_id" => $budget_source_id,
            "is_budget_increase" => True,
        ]);

        $observation = new Observation(['description' => $observation]);

        $budget->observation()->save($observation);

        $update_project = writeTimeline(
            $project_id,
            $user,
            $observation,
            "project_budget"
        );

        DB::commit();

        return $update_project;
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
