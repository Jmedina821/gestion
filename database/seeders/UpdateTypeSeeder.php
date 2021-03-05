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
            ["name" => "Aumento de presupuesto (Proyecto)"],
            ["name" => "Ampliación de metas (Proyecto)"],
            ["name" => "Modificación fecha de culminación (Proyecto)"],
            ["name" => "Actualización de Status"],
            ["name" => "Modificación fecha de culminación (Actividad)"],
        ];

        foreach($updatesTypes as $updateType){
            UpdateType::create($updateType);
        }
    }
}
