<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ["name" => "users", "label" => "Usuarios" ],
            ["name" => "institutions", "label" => "Instituciones" ],
            ["name" => "programs", "label" => "Programas" ],
            ["name" => "projects", "label" => "Proyectos" ],
            ["name" => "activities", "label" => "Actividades" ],
            ["name" => "scopes", "label" => "Permisos" ],              
            ["name" => "roles", "label" => "Roles" ],              
            ["name" => "modules", "label" => "Modulos" ]
        ];
        foreach ($modules as $module) {
            Module::create([
                "name" => $module["name"],
                "label" => $module["label"]
            ]);    
        }
    }
}
