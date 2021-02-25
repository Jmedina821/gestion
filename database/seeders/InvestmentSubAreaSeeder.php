<?php

namespace Database\Seeders;

use App\Models\InvestmentArea;
use App\Models\InvestmentSubArea;
use Illuminate\Database\Seeder;

class InvestmentSubAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicios_publicos = InvestmentArea::where('name', '=', 'SERVICIOS PUBLICOS')->first();
        $salud = InvestmentArea::where('name', '=', 'SALUD')->first();
        $eduacion = InvestmentArea::where('name', '=', 'EDUCACION')->first();
        $economia = InvestmentArea::where('name', '=', 'ECONOMIA')->first();
        $social = InvestmentArea::where('name', '=', 'SOCIAL')->first();
        $cultura = InvestmentArea::where('name', '=', 'CULTURA')->first();
        $deporte = InvestmentArea::where('name', '=', 'DEPORTE')->first();
        $tecnologia = InvestmentArea::where('name', '=', 'TECNOLOGIA')->first();
        $comunicacion = InvestmentArea::where('name', '=', 'COMUNICACION')->first();
        $seguridad = InvestmentArea::where('name', '=', 'SEGURIDAD')->first();
        $politico = InvestmentArea::where('name', '=', 'POLITICO')->first();
        $sub_areas = [
            
            [
                "name" => 'POLITICO',
                "investment_area_id" => $politico->id
            ],
            [
                "name" => 'SEGURIDAD',
                "investment_area_id" => $seguridad->id
            ],
            [
                "name" => 'COMUNICACION',
                "investment_area_id" => $comunicacion->id
            ],
            [
                "name" => 'TECNOLOGIA',
                "investment_area_id" => $tecnologia->id
            ],
            [
                "name" => 'DEPORTE',
                "investment_area_id" => $deporte->id
            ],
            [
                "name" => 'CULTURA',
                "investment_area_id" => $cultura->id
            ],
            [
                "name" => 'SOCIAL',
                "investment_area_id" => $social->id
            ],
            [
                "name" => 'ECONOMIA',
                "investment_area_id" => $economia->id
            ],
            [
                "name" => 'GAS DOMESTICO',
                "investment_area_id" => $servicios_publicos->id
            ],
            [
                "name" => 'ELECTRICIDAD',
                "investment_area_id" => $servicios_publicos->id
            ],
            [
                "name" => 'AGUAS BLANCAS',
                "investment_area_id" => $servicios_publicos->id
            ],
            [
                "name" => 'AGUAS NEGRAS',
                "investment_area_id" => $servicios_publicos->id
            ],
            [
                "name" => 'ASEO',
                "investment_area_id" => $servicios_publicos->id
            ],            
            [
                "name" => 'MEDICINA RURAL',
                "investment_area_id" => $salud->id
            ],
            [
                "name" => 'MEDICINA URBANA',
                "investment_area_id" => $salud->id
            ],
            [
                "name" => 'EDUCACION INICIAL',
                "investment_area_id" => $eduacion->id
            ],
            [
                "name" => 'EDUCACION BASICA',
                "investment_area_id" => $eduacion->id
            ],
            [
                "name" => 'EDUCACION MEDIA',
                "investment_area_id" => $eduacion->id
            ],
            [
                "name" => 'EDUCACION SUPERIOR',
                "investment_area_id" => $eduacion->id
            ]
        ];



        foreach ($sub_areas as $sub_area) {
            InvestmentSubArea::create($sub_area);
        }

    }
}
