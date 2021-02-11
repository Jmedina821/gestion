<?php

namespace Database\Seeders;

use App\Models\Measurement;
use Illuminate\Database\Seeder;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $measurements = [
            ["name" => "Personas", "short_name" => "personas"],
            ["name" => "Kilometros", "short_name" => "Km"],
            ["name" => "Hectareas", "short_name" => "Has"],                                           
        ];
        foreach ($measurements as $measurement) {
            Measurement::create($measurement);
        }
    }
}
