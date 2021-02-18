<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Scope;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super_admin'])
            ->scopes()->attach(Scope::all()->map(function ($scope) {
                return $scope->id;
            }));
    }
}
