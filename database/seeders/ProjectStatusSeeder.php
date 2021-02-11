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
            ["name" => "CULMINADO"],
            ["name" => "INAUGURADA"],
            ["name" => "EN EJECUCION"],
            ["name" => "PARALIZADA"],
            ["name" => "CULMINADA INCONCLUSA"]
        ];

        foreach ($status as $st) {
            ProjectStatus::create($st);
        }
    }
}
