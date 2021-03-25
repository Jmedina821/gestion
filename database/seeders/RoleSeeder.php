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
            Role::create(['name' => 'secretario'])
            ->scopes()->attach([
                Scope::where('scope','=',"programs:menu")->get()->first()->id,
                Scope::where('scope','=',"programs:create")->get()->first()->id,
                Scope::where('scope','=',"programs:update")->get()->first()->id,
                Scope::where('scope','=',"programs:read")->get()->first()->id,
                Scope::where('scope','=',"projects:menu")->get()->first()->id,
                Scope::where('scope','=',"projects:create")->get()->first()->id,
                Scope::where('scope','=',"projects:update")->get()->first()->id,
                Scope::where('scope','=',"projects:read")->get()->first()->id,
                Scope::where('scope','=',"activities:menu")->get()->first()->id,
                Scope::where('scope','=',"activities:create")->get()->first()->id,
                Scope::where('scope','=',"activities:update")->get()->first()->id,
                Scope::where('scope','=',"activities:read")->get()->first()->id,
            ]);
    }
}
