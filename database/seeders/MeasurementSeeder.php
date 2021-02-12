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
            ["name" => "Unidades", "short_name" => "unid"],
            ["name" => "Personas", "short_name" => "personas"],
            ["name" => "Kilometros", "short_name" => "km"],
            ["name" => "Toneladas", "short_name" => "t"],
            ["name" => "Hectareas", "short_name" => "has"],
            ["name" => "Metros", "short_name" => "m"],
            ["name" => "Kilogramos", "short_name" => "kg"],
            ["name" => "Litros", "short_name" => "l"],
            ["name" => "Metros Cubicos", "short_name" => "m3"],

        ];
        foreach ($measurements as $measurement) {
            Measurement::create($measurement);
        }
    }
}
