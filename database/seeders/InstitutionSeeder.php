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
            ["code" => "E001" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA LA PLANIFICACION Y FINANZAS DE LA GESTIÓN DE GOBIERNO"],
            ["code" => "E002" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL DESARROLLO ECONÓMICO PRODUCTIVO"],
            ["code" => "E003" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL DESARROLLO DE OBRAS Y SERVICIOS PUBLICOS"],
            ["code" => "E004" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL SISTEMA DE PROTECCIÓN SOCIAL PARA EL PROGRESO"],
            ["code" => "E005" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA DE SALUD PUBLICA"],
            ["code" => "E006" , "parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA LA SOBERANIA, SEGURIDAD Y PAZ TERRITORIAL"],
            /* ["code" => "E007" , "parent_id" => null, "name" => "SECRETARIA GENERAL DE GOBIERNO"], */
            ["code" => "E008" , "parent_id" => null, "name" => "UNIDADES DE APOYO ADSCRITAS AL DESPACHO DEL GOBERNADOR"],
            /* ["code" => "E009" , "parent_id" => null, "name" => "SECRETARIA DEL DESPACHO"], 
            ["code" => "E010" , "parent_id" => null, "name" => "SECRETARIA PRIVADA DEL GOBERNADOR"]*/
        ];

        foreach ($secretarias_e as $sec_e) {
            Institution::create($sec_e);
        }

        $planificacion_y_finanzas = Institution::where('name','=',"SECRETARIA EJECUTIVA PARA LA PLANIFICACION Y FINANZAS DE LA GESTIÓN DE GOBIERNO")->first();
        $desarrollo_economico = Institution::where('name','=',"SECRETARIA EJECUTIVA PARA EL DESARROLLO ECONÓMICO PRODUCTIVO")->first();
        $obras_y_servicios_publicos = Institution::where('name','=',"SECRETARIA EJECUTIVA PARA EL DESARROLLO DE OBRAS Y SERVICIOS PUBLICOS")->first();
        $protección_social = Institution::where('name','=',"SECRETARIA EJECUTIVA PARA EL SISTEMA DE PROTECCIÓN SOCIAL PARA EL PROGRESO")->first();
        $salud_publica = Institution::where('name','=',"SECRETARIA EJECUTIVA DE SALUD PUBLICA")->first();
        $paz_territorial = Institution::where('name','=',"SECRETARIA EJECUTIVA PARA LA SOBERANIA, SEGURIDAD Y PAZ TERRITORIAL")->first();
        $secretaria_general = Institution::where('name','=',"SECRETARIA GENERAL DE GOBIERNO")->first();
        $unid_de_apoyo = Institution::where('name','=',"UNIDADES DE APOYO ADSCRITAS AL DESPACHO DEL GOBERNADOR")->first();
        $despacho = Institution::where('name','=',"SECRETARIA DEL DESPACHO")->first();
        $privada = Institution::where('name','=',"SECRETARIA PRIVADA DEL GOBERNADOR")->first();

        $secretarias = [
            ["code" => "S001" , "parent_id" => $planificacion_y_finanzas->id, "name" => "SECRETARIA DE FINANZAS"],
            ["code" => "S002" , "parent_id" => $planificacion_y_finanzas->id, "name" => "SECRETARÍA DE PLANIFICACIÓN Y PRESUPUESTO"],
            ["code" => "S003" , "parent_id" => $planificacion_y_finanzas->id, "name" => "DIRECCIÓN GENERAL DE TALENTO HUMANO"],
            ["code" => "S004" , "parent_id" => $planificacion_y_finanzas->id, "name" => "SUPERINTENDENCIA DE ADMINISTRACIÓN TRIBUTARIA (SUATEBG)"],
            ["code" => "S005" , "parent_id" => $planificacion_y_finanzas->id, "name" => "FONDO DE EFICIENCIA PARA EL DESARROLLO DEL ESTADO BOLIVARIANO DE GUARICO (FONDEFIG)"],
            ["code" => "S006" , "parent_id" => $planificacion_y_finanzas->id, "name" => "SOCIEDAD DE GARANTIAS RECIPROCAS"],
            ["code" => "S007" , "parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA DE PRODUCCIÓN"],
            ["code" => "S008" , "parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA PARA EL DESARROLLO INDUSTRIAL"],
            ["code" => "S009" , "parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA DE ALIMENTACIÓN"],
            ["code" => "S010" , "parent_id" => $desarrollo_economico->id, "name" => "FONDO DE DESARROLLO REGIONAL DEL ESTADO GUARICO (FONDER)"],
            ["code" => "S011" , "parent_id" => $desarrollo_economico->id, "name" => "FONDO PARA EL DESARROLLO SOCIOPRODUCTIVO DEL ESTADO GUARICO (FODESOPRO)"],
            ["code" => "S012" , "parent_id" => $desarrollo_economico->id, "name" => "CORPORACIÓN DE TURISMO POPULAR DEL ESTADO BOLIVARIANO DE GUARICO (CORPOTURISMO)"],
            ["code" => "S013" , "parent_id" => $desarrollo_economico->id, "name" => "AGROGUARICO POTENCIA, S.A"],
            ["code" => "S014" , "parent_id" => $desarrollo_economico->id, "name" => "CORPOGUARICO POTENCIA, S.A."],
            ["code" => "S015" , "parent_id" => $desarrollo_economico->id, "name" => "ALIMENTOS DEL GUARICO S.A. (ALGUARISA)"],
            ["code" => "S016" , "parent_id" => $desarrollo_economico->id, "name" => "INSTITUTO PUBLICO MINERO DEL ESTADO BOLIVARIANO DE GUARICO (IPMEBG)"],
            ["code" => "S017" , "parent_id" => $desarrollo_economico->id, "name" => "AGUAS TERMALES HOTEL & SPA S.A"],
            ["code" => "S018" , "parent_id" => $desarrollo_economico->id, "name" => "INSTITUTO DE CIENCIA Y TECNOLOGIA DEL ESTADO BOLIVARIANO DE GUARICO (INCITEBG)"],
            ["code" => "S019" , "parent_id" => $desarrollo_economico->id, "name" => "Sistema Socialista de Proveduria del Estado Bolivariano de Guarico (SISOPROGUA)"],
            ["code" => "S020" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "SECRETARIA DE INFRAESTRUCTURA"],
            ["code" => "S021" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "SECRETARIA DE SERVICIOS PUBLICOS"],
            ["code" => "S022" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "CONSTRUGUARICO"],
            ["code" => "S023" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "CONSTRUVIALGUA"],
            ["code" => "S024" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "FUNDACIÓN PATRIA SOCIALISTA"],
            ["code" => "S025" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "BUSGUARICO, C.A"],
            ["code" => "S026" , "parent_id" => $obras_y_servicios_publicos->id, "name" => "DISTRIBUIDORA DEL GAS GUARICO, C.A."],
            ["code" => "S027" , "parent_id" => $protección_social->id, "name" => "SECRETARIA DE PROTECCION SOCIAL"],
            ["code" => "S028" , "parent_id" => $protección_social->id, "name" => "SECRETARIA DE EDUCACION"],
            ["code" => "S029" , "parent_id" => $protección_social->id, "name" => "SECRETARIA DE EDUCACION UNIVERSITARIA"],
            ["code" => "S030" , "parent_id" => $protección_social->id, "name" => "INSTITUTO AUTONOMO DEL DEPORTE DEL ESTADO BOLIVARIANO DE GUARICO (IADEBG)"],
            ["code" => "S031" , "parent_id" => $protección_social->id, "name" => "INSTITUTO DE LA MUJER DEL ESTADO GUARICO (IMUGUA)"],
            ["code" => "S032" , "parent_id" => $protección_social->id, "name" => "INSTITUTO DE LA JUVENTUD DEL ESTADO BOLIVARIANO DE GUARICO (INJUVEBG)"],
            ["code" => "S033" , "parent_id" => $protección_social->id, "name" => "INSTITUTO AUTONOMO DE LA VIVIENDA DEL ESTADO BOLIVARIANO DE GUARICO (IAVHEBG)"],
            ["code" => "S034" , "parent_id" => $protección_social->id, "name" => "FUNDACULGUA"],
            ["code" => "S035" , "parent_id" => $protección_social->id, "name" => "FUNDACION REGIONAL EL NIÑO SIMON DEL ESTADO GUARICO"],
            ["code" => "S036" , "parent_id" => $protección_social->id, "name" => "FUNDACION ORQUESTA SINFONICA JUVENIL E INFANTIL DEL ESTADO GUARICO (FOSIJEG)"],
            ["code" => "S037" , "parent_id" => $protección_social->id, "name" => "FUNDACION ORQUESTA SINFONICA DEL ESTADO GUARICO (FOSEG)"],
            ["code" => "S038" , "parent_id" => $protección_social->id, "name" => "ENCOMUNA"],
            ["code" => "S039" , "parent_id" => $protección_social->id, "name" => "RED DE BIBLIOTECAS PUBLICAS DEL ESTADO BOLIVARIANO DE GUARICO"],
            ["code" => "S040" , "parent_id" => $salud_publica->id, "name" => "SECRETARIA DE SALUD PUBLICA"],
            ["code" => "S041" , "parent_id" => $salud_publica->id, "name" => "FUNDACION PARA EL SERVICIO MEDICO INTEGRAL DEL ESTADO BOLIVARIANO DE GUARICO (FUSAMIEBG)"],
            ["code" => "S042" , "parent_id" => $salud_publica->id, "name" => "ASOCIACIÓN CIVIL DE MEDICINA Y CIENCIAS DEL DEPORTE DEL ESTADO GUARICO (ASOMECID)"],
            ["code" => "S043" , "parent_id" => $paz_territorial->id, "name" => "Secretaria de Seguridad y Defensa Ciudadana"],
            ["code" => "S044" , "parent_id" => $paz_territorial->id, "name" => "DIRECCION DE PROTECCION CIVIL Y ADMINISTRACION DE DESASTRES"],
            ["code" => "S045" , "parent_id" => $paz_territorial->id, "name" => "CUERPO DE BOMBEROS DEL ESTADO BOLIVARIANO DE GUARICO"],
            ["code" => "S046" , "parent_id" => $paz_territorial->id, "name" => "INSTITUTO AUTONOMO DE LA POLICIA DEL ESTADO BOLIVARIANO DE GUARICO (IAPEBG)"],
            ["code" => "S047" , "parent_id" => $paz_territorial->id, "name" => "INSTITUTO DE PREVISION SOCIAL DEL POLICIA DEL ESTADO GUARICO (IPSPEGUA)"],
            ["code" => "S048" , "parent_id" => $paz_territorial->id, "name" => "CENTRO DE FORMACION POLICIAL DEL ESTADO BOLIVARIANO DE GUARICO (CEFOPOL)"],/* 
            ["code" => "S049" , "parent_id" => $privada->id, "name" => "RESIDENCIA OFICIAL DEL GOBERNADOR"],
            ["code" => "S050" , "parent_id" => $privada->id, "name" => "UNIDAD AEREA"], 
            ["code" => "S051" , "parent_id" => $despacho->id, "name" => "DIRECCION GENERAL"],
            ["code" => "S052" , "parent_id" => $despacho->id, "name" => "DIRECCION DE PROTOCOLO"],
            ["code" => "S053" , "parent_id" => $despacho->id, "name" => "DIRECCION DE ADMINISTRACION"],*/
            ["code" => "S054" , "parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION GENERAL DE AUDITORIA INTERNA"],
            ["code" => "S055" , "parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION GENERAL DE ATENCION CIUDADANA"],
            ["code" => "S056" , "parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION DE CONSULTORIA JURIDICA"],
            ["code" => "S057" , "parent_id" => $unid_de_apoyo->id, "name" => "DIRECCIÓN GENERAL DE INFORMATICA"]/* 
            ["code" => "S058" , "parent_id" => $secretaria_general->id, "name" => "SECRETARIA DE GESTION TERRITORIAL"],
            ["code" => "S059" , "parent_id" => $secretaria_general->id, "name" => "DIRECCION DE ARCHIVO CENTRAL Y ACERVO HISTORICO"],
            ["code" => "S060" , "parent_id" => $secretaria_general->id, "name" => "DIRECCION GENERAL DE TRANSPORTE"],
            ["code" => "S061" , "parent_id" => $secretaria_general->id, "name" => "COMISION DE CONTRATACIONES PUBLICAS"], */

        ];

        foreach ($secretarias as $sec) {
            Institution::create($sec);
        }
    }
}
