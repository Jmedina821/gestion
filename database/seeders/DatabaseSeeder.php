<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            BudgetSourceSeeder::class,
            InstitutionSeeder::class,
            InvestmentAreaSeeder::class,
            ProjectStatusSeeder::class,
            MunicipioSeeder::class,
            MeasurementSeeder::class,
            ModuleSeeder::class,
            ScopeSeeder::class,
            RoleSeeder::class,
            InvestmentSubAreaSeeder::class
        ]);
        $this->call(UserSeeder::class);
    }
}
