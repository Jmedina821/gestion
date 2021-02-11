<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $secretarias_e = [
            ["parent_id" => null, "name" => "ORGANOS AUTONOMOS"],
            ["parent_id" => null, "name" => "DESPACHO DEL GOBERNADOR"],
            ["parent_id" => null, "name" => "SECRETARIA GENERAL DE GOBIERNO"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA DE PLANIFICACION Y FINANZAS"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL DESARROLLO DEL MODELO ECONOMICO PRODUCTIVO"],
            ["parent_id" => null, "name" => "SECRETARÍA EJECUTIVA  DE OBRAS Y SERVICIOS PUBLICOS"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL SISTEMA DE PROTECCIÓN SOCIAL PARA EL PROGRESO"],
            ["parent_id" => null, "name" => "SECRETARÍA DE SALUD PUBLICA"],
            ["parent_id" => null, "name" => "SECRETARÍA DE SEGURIDAD Y DEFENSA CIUDADANA"],
        ];
        foreach ($secretarias_e as $sec_e) {
            Institution::create($sec_e);
        }
    }
}
