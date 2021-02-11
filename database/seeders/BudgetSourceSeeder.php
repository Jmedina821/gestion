<?php

namespace Database\Seeders;

use App\Models\BudgetSource;
use Illuminate\Database\Seeder;

class BudgetSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            ["name" => "RECURSOS ORDINARIO"],
            ["name" => "CREDITOS ADICIONALES"],
            ["name" => "FCI"],
            ["name" => "RECURSOS PROPIOS"],
            ["name" => "OTROS"],
        ];

        foreach ($sources as $source) {
            BudgetSource::create($source);
        }
    }
}
