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
            ["name" => "SALUD"],
            ["name" => "ECONOMIA"],
            ["name" => "SOCIAL"],
            ["name" => "EDUCACION"],
            ["name" => "CULTURA"],
            ["name" => "DEPORTE"],
            ["name" => "TECNOLOGIA"],
            ["name" => "COMUNICACIÓN"],
            ["name" => "SEGURIDAD"],
            ["name" => "SERVICIOS PUBLICOS"],
            ["name" => "POLITICO"],
        ];
        foreach ($areas as $area) {
            InvestmentArea::create($area);
        }
    }
}
