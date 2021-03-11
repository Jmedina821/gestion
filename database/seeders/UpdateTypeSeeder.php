<?php

namespace Database\Seeders;

use App\Models\UpdateType;
use Illuminate\Database\Seeder;

class UpdateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $updatesTypes = [
            [
                "name" => "Aumento de presupuesto (Proyecto)",
                "code_name" => "project_budget"
            ],
            [
                "name" => "Ampliación de metas (Proyecto)",
                "code_name" => "project_goal"
            ],
            [
                "name" => "Modificación fecha de culminación (Proyecto)",
                "code_name" => "project_culmination_date"
            ],
            [
                "name" => "Actualización de Status",
                "code_name" => "project_status"
            ],
            [
                "name" => "Modificación fecha de culminación (Actividad)",
                "code_name" => "activity_culmination_date"
            ],
        ];

        foreach($updatesTypes as $updateType){
            UpdateType::create($updateType);
        }
    }
}
