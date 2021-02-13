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
        $sub_areas = [
            [
                "name" => 'GAS DOMESTICO',
                "investment_area_id" => $servicios_publicos->id
            ],
            [
                "name" => 'ELECTRICIDAD',
                "investment_area_id" => $servicios_publicos->id
            ],[
                "name" => 'ATENCION MEDICA',
                "investment_area_id" => $salud->id
            ],[
                "name" => 'INSUMOS MEDICOS',
                "investment_area_id" => $salud->id
            ]
        ];



        foreach ($sub_areas as $sub_area) {
            InvestmentSubArea::create($sub_area);
        }

    }
}
