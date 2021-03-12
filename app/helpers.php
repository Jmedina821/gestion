<?php

use App\Models\Budget;
use App\Models\MeasurementUnit;
use App\Models\Project;
use App\Models\Timeline;
use App\Models\UpdateType;
use Illuminate\Support\Facades\DB;

function writeTimeline(
    $project_id, //De tipo laravel collection
    $user, //Auth user instance
    $observation, // string
    $update_code_name,
    $updated_measurement = null,
    $previous_value = ''
    ){

    $current_value = '';
    $update_type_id = UpdateType::where('code_name',"=",$update_code_name)->get()->first()->id;
    $project = Project::where('id', '=', $project_id)->with('measurement_unit')->get()->first(); 

    if ($update_code_name === "project_goal" && isset($updated_measurement)){

    } elseif ($update_code_name === "project_budget" ) 
    {
    
        $budget_count = Budget::where('project_id', '=', $project_id)->count();
        $previous_value = Budget::where('project_id', '=', $project_id)->orderBy('created_at','desc')->skip(1)->take( $budget_count - 1 )->get()->sum('value');
        $current_value = Budget::where('project_id', '=', $project_id)->orderBy('created_at','desc')->get()->sum('value');
    
    } elseif ( $update_code_name === "project_status") {

        $current_value = Project::where('id','=',$project_id)->with('project_status')->get()->first()->project_status->name;
        
    }

    $project->timeline()->create([
        'current_value' => $current_value,
        'previous_value' => $previous_value,
        'user_id' => $user->id,
        'update_type_id' => $update_type_id,
    ])->observation()->save($observation);

    $project = Project::where('id', '=', $project_id)->with('program', 'investmentSubAreas', 'measurement_unit', 'project_status', 'budgets.budgetSource','modified_culmination_dates','timeline.observation')->get()->first();

    return $project; 
}
