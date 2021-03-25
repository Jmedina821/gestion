<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Scope;
use Illuminate\Database\Seeder;

class ScopeSeeder extends Seeder
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
            ["name" => "modules", "label" => "Modulos" ],
            ["name" => "statistics", "label" => "Estadisticas" ],
            ["name" => "map", "label" => "Mapa" ],
        ];
    
        $modules = [
            "users" => [
                ["name" => "menu", "scope" => "users:menu"],
                ["name" => "crear", "scope" => "users:create"],
                ["name" => "eliminar", "scope" => "users:delete"],
                ["name" => "editar", "scope" => "users:update"],
                ["name" => "ver", "scope" => "users:read"],
            ],
            "institutions" => [
                ["name" => "menu", "scope" => "institutions:menu"],
                ["name" => "crear", "scope" => "institutions:create"],
                ["name" => "eliminar", "scope" => "institutions:delete"],
                ["name" => "editar", "scope" => "institutions:update"],
                ["name" => "ver", "scope" => "institutions:read"],
            ],
            "programs" => [
                ["name" => "menu", "scope" => "programs:menu"],
                ["name" => "crear", "scope" => "programs:create"],
                ["name" => "eliminar", "scope" => "programs:delete"],
                ["name" => "editar", "scope" => "programs:update"],
                ["name" => "ver", "scope" => "programs:read"],
            ],
            "projects" => [
                ["name" => "menu", "scope" => "projects:menu"],
                ["name" => "crear", "scope" => "projects:create"],
                ["name" => "eliminar", "scope" => "projects:delete"],
                ["name" => "editar", "scope" => "projects:update"],
                ["name" => "ver", "scope" => "projects:read"],
            ],
            "activities" => [
                ["name" => "menu", "scope" => "activities:menu"],
                ["name" => "crear", "scope" => "activities:create"],
                ["name" => "eliminar", "scope" => "activities:delete"],
                ["name" => "editar", "scope" => "activities:update"],
                ["name" => "ver", "scope" => "activities:read"],
            ],
            "scopes" => [
                ["name" => "menu", "scope" => "scopes:menu"],
                ["name" => "crear", "scope" => "scopes:create"],
                ["name" => "eliminar", "scope" => "scopes:delete"],
                ["name" => "editar", "scope" => "scopes:update"],
                ["name" => "ver", "scope" => "scopes:read"],
            ],
            "roles" => [
                ["name" => "menu", "scope" => "roles:menu"],
                ["name" => "crear", "scope" => "roles:create"],
                ["name" => "eliminar", "scope" => "roles:delete"],
                ["name" => "editar", "scope" => "roles:update"],
                ["name" => "ver", "scope" => "roles:read"],
            ],
            "modules" => [
                ["name" => "menu", "scope" => "modules:menu"],
                ["name" => "crear", "scope" => "modules:create"],
                ["name" => "eliminar", "scope" => "modules:delete"],
                ["name" => "editar", "scope" => "modules:update"],
                ["name" => "ver", "scope" => "modules:read"],
            ],
            "statistics" => [
                ["name" => "menu", "scope" => "statistics:menu"],
                ["name" => "crear", "scope" => "statistics:create"],
                ["name" => "eliminar", "scope" => "statistics:delete"],
                ["name" => "editar", "scope" => "statistics:update"],
                ["name" => "ver", "scope" => "statistics:read"],
            ],
            "map" => [
                ["name" => "ver", "scope" => "map:menu"],
                ["name" => "ver", "scope" => "map:read"]
            ]
        ];

        foreach ($modules as $module => $scopes) {
            $_module = Module::where('name', '=', $module)
                ->get()->first();
            foreach ($scopes as $scope) {
                Scope::create([
                    "name" => $scope["name"],
                    "scope" => $scope["scope"],
                    "module_id" => $_module->id,
                ]);
            }
        }
    }
}
