<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = [
            ["name" => "EN CURSO"],
            ["name" => "EN EJECUCION"],
            ["name" => "CULMINADO"],
            ["name" => "INAUGURADO"],
            ["name" => "PARALIZADO"],
            ["name" => "CULMINADO INCONCLUSO"]
        ];

        foreach ($status as $st) {
            ProjectStatus::create($st);
        }
    }
}
