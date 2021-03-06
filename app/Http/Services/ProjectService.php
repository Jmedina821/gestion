<?php

namespace App\Http\Services;

use App\Models\Institution;
use App\Models\Project;
use App\Models\Budget;
use App\Models\Activity;
use App\Models\MeasurementUnit;
use App\Models\Observation;
use App\Models\Timeline;
use App\Models\UpdateType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function store(array $projectData)
    {
        $user = Auth::user();
        $observation = new Observation(["description" => "Creación de proyecto"]);

        DB::beginTransaction();
        $investment_sub_areas = $projectData["investment_sub_areas"];
        $budgets = $projectData["budgets"];
        $measurement = $projectData["measurement_units"];
        $project = Project::create($projectData);
        $project->investmentSubAreas()->attach($investment_sub_areas);
        $project->budgets()->createMany($budgets);
        $project->measurement_unit()->syncWithoutDetaching($measurement);

        $timeline_entry = writeTimeline(
            $project->id,
            $user,
            $observation,
            "project_creation",
            null
        );

        DB::commit();
        return $project;
    }

    public function update(string $project_id, array $projectData)
    {
        $user = Auth::user();
        $observation = $projectData["observation"];
        $project_to_update = Project::where('id', '=', $project_id)->firstOrFail();

        DB::beginTransaction();

        $investment_sub_areas = $projectData["investment_sub_areas"];
        $budgets = $projectData["budgets"];
        $measurement = $projectData["measurement_units"];


        $project_to_update->investmentSubAreas()->detach();
        $project_to_update->investmentSubAreas()->sync($investment_sub_areas);

        $project_to_update->budgets()->delete();
        $project_to_update->budgets()->createMany($budgets);


        $project_to_update->measurement_unit()->sync($measurement);

        $project_to_update = $project_to_update->update($projectData);

        $timeline_entry = writeTimeline(
            $project_id,
            $user,
            new Observation(['description' => $observation]),
            "project_update",
            null
        );

        DB::commit();
        return $project_to_update;
    }

    public function updateProjectStatus(
        string $project_id,
        string $project_status_id = null,
        string $observation
    ) {

        $user = Auth::user();
        $observation = new Observation(['description' => $observation]);

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
    ) {
        $user = Auth::user();
        $project_id = $modify_culmination_data["project_id"];
        $new_date = $modify_culmination_data["modified_culmination_date"];
        $description = $modify_culmination_data["observation"];

        $project = Project::where('id', '=', $project_id)->get()->first();

        DB::begintransaction();

        $previous_value = $project->end_date;

        $project_to_check = Project::where('id', '=', $project_id)->with('modified_culmination_dates')->whereHas('modified_culmination_dates')->get();

        if (sizeof($project_to_check) > 0) {
            $previous_value = $project_to_check->first()->modified_culmination_dates->sortByDesc('modified_date')->first()->modified_date;
        }

        $project->modified_culmination_dates()->create([
            'modified_date' => $new_date,
        ])->observation()->create(['description' => $description]);

        $project = writeTimeline(
            $project_id,
            $user,
            new Observation(["description" => $description]),
            "project_culmination_date",
            null,
            $previous_value
        );

        DB::commit();

        return $project;
    }

    public function increaseGoals(
        array $increase_goals_data
    ) {
        $user = Auth::user();
        $project_id = $increase_goals_data["project_id"];
        $measurement = $increase_goals_data["measurement"];
        $observation = $increase_goals_data["observation"];

        DB::beginTransaction();

        $project = Project::where('id', '=', $project_id)->get()->first();

        $previous_measurements = [];

        /* foreach ($measurement as $measure_id => $value) {
            $previous_measure = Project::where('id','=',$project_id)->with('measurement_unit')->whereHas('measurement_unit', function ($query) use ($measure_id){
                return $query->where('id','=',$measure_id);
            })->get()->first();

            if(isset($previous_measure)){
                $previous_measure = $previous_measure->pivot->proposed_goal;
                array_push($previous_measurements,$previous_measure);
            }       
        } */

        $project->measurement_unit()->syncWithoutDetaching($measurement);

        foreach ($measurement as $measure_id => $value) {

            writeTimeline(
                $project_id,
                $user,
                new Observation(["description" => $observation]),
                "project_goal",
                $measure_id
            );
        }

        DB::commit();

        $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource', 'modified_culmination_dates', 'timeline.observation')->get()->first();

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
        string $municipio_id = null,
        string $program_id = null,
        string $institution_id = null,
        array $investment_areas = null,
        string $project_status_id = null,
        bool $is_planified = null
    ) {
        $projects = Project::with('program.institution', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource', 'budgets.observation', 'timeline.observation', 'modified_culmination_dates');

        if (isset($program_id)) {
            $projects = $projects->where('program_id', $program_id);
        }

        if (isset($municipio_id)) {
            $projects = $projects->whereHas('activities.parroquia.municipio', function ($q) use ($municipio_id) {
                $q->where('id', $municipio_id);
            });
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
