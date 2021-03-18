<?php

namespace Database\Seeders;

use App\Models\InvestmentArea;
use Illuminate\Database\Seeder;

class InvestmentAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ["name" => "SALUD", "code" => 1],
            ["name" => "ECONOMIA", "code" => 2],
            ["name" => "SOCIAL", "code" => 3],
            ["name" => "EDUCACION", "code" => 4],
            ["name" => "CULTURA", "code" => 5],
            ["name" => "DEPORTE", "code" => 6],
            ["name" => "TECNOLOGIA", "code" => 7],
            ["name" => "COMUNICACION", "code" => 8],
            ["name" => "SEGURIDAD", "code" => 9],
            ["name" => "SERVICIOS PUBLICOS", "code" => 10],
            ["name" => "POLITICO", "code" => 11],
        ];
        foreach ($areas as $area) {
            InvestmentArea::create($area);
        }
    }
}
