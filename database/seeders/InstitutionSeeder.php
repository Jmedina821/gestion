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
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA LA PLANIFICACION Y FINANZAS DE LA GESTIÓN DE GOBIERNO"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL DESARROLLO ECONÓMICO PRODUCTIVO"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL DESARROLLO DE OBRAS Y SERVICIOS PUBLICOS"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA EL SISTEMA DE PROTECCIÓN SOCIAL PARA EL PROGRESO"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA DE SALUD PUBLICA"],
            ["parent_id" => null, "name" => "SECRETARIA EJECUTIVA PARA LA SOBERANIA, SEGURIDAD Y PAZ TERRITORIAL"],
            ["parent_id" => null, "name" => "SECRETARIA GENERAL DE GOBIERNO"],
            ["parent_id" => null, "name" => "UNIDADES DE APOYO ADSCRITAS AL DESPACHO DEL GOBERNADOR"],
            ["parent_id" => null, "name" => "SECRETARIA DEL DESPACHO"],
            ["parent_id" => null, "name" => "SECRETARIA PRIVADA DEL GOBERNADOR"]
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
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "SECRETARIA DE FINANZAS"],
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "SECRETARÍA DE PLANIFICACIÓN Y PRESUPUESTO"],
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "DIRECCIÓN GENERAL DE TALENTO HUMANO"],
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "SUPERINTENDENCIA DE ADMINISTRACIÓN TRIBUTARIA (SUATEBG)"],
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "FONDO DE EFICIENCIA PARA EL DESARROLLO DEL ESTADO BOLIVARIANO DE GUARICO (FONDEFIG)"],
            ["parent_id" => $planificacion_y_finanzas->id, "name" => "SOCIEDAD DE GARANTIAS RECIPROCAS"],
            ["parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA DE PRODUCCIÓN"],
            ["parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA PARA EL DESARROLLO INDUSTRIAL"],
            ["parent_id" => $desarrollo_economico->id, "name" => "SECRETARIA DE ALIMENTACIÓN"],
            ["parent_id" => $desarrollo_economico->id, "name" => "FONDO DE DESARROLLO REGIONAL DEL ESTADO GUARICO (FONDER)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "FONDO PARA EL DESARROLLO SOCIOPRODUCTIVO DEL ESTADO GUARICO (FODESOPRO)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "CORPORACIÓN DE TURISMO POPULAR DEL ESTADO BOLIVARIANO DE GUARICO (CORPOTURISMO)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "AGROGUARICO POTENCIA, S.A"],
            ["parent_id" => $desarrollo_economico->id, "name" => "CORPOGUARICO POTENCIA, S.A."],
            ["parent_id" => $desarrollo_economico->id, "name" => "ALIMENTOS DEL GUARICO S.A. (ALGUARISA)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "INSTITUTO PUBLICO MINERO DEL ESTADO BOLIVARIANO DE GUARICO (IPMEBG)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "AGUAS TERMALES HOTEL & SPA S.A"],
            ["parent_id" => $desarrollo_economico->id, "name" => "INSTITUTO DE CIENCIA Y TECNOLOGIA DEL ESTADO BOLIVARIANO DE GUARICO (INCITEBG)"],
            ["parent_id" => $desarrollo_economico->id, "name" => "Sistema Socialista de Proveduria del Estado Bolivariano de Guarico (SISOPROGUA)"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "SECRETARIA DE INFRAESTRUCTURA"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "SECRETARIA DE SERVICIOS PUBLICOS"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "CONSTRUGUARICO"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "CONSTRUVIALGUA"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "FUNDACIÓN PATRIA SOCIALISTA"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "BUSGUARICO, C.A"],
            ["parent_id" => $obras_y_servicios_publicos->id, "name" => "DISTRIBUIDORA DEL GAS GUARICO, C.A."],
            ["parent_id" => $protección_social->id, "name" => "SECRETARIA DE PROTECCION SOCIAL"],
            ["parent_id" => $protección_social->id, "name" => "SECRETARIA DE EDUCACION"],
            ["parent_id" => $protección_social->id, "name" => "SECRETARIA DE EDUCACION UNIVERSITARIA"],
            ["parent_id" => $protección_social->id, "name" => "INSTITUTO AUTONOMO DEL DEPORTE DEL ESTADO BOLIVARIANO DE GUARICO (IADEBG)"],
            ["parent_id" => $protección_social->id, "name" => "INSTITUTO DE LA MUJER DEL ESTADO GUARICO (IMUGUA)"],
            ["parent_id" => $protección_social->id, "name" => "INSTITUTO DE LA JUVENTUD DEL ESTADO BOLIVARIANO DE GUARICO (INJUVEBG)"],
            ["parent_id" => $protección_social->id, "name" => "INSTITUTO AUTONOMO DE LA VIVIENDA DEL ESTADO BOLIVARIANO DE GUARICO (IAVHEBG)"],
            ["parent_id" => $protección_social->id, "name" => "FUNDACULGUA"],
            ["parent_id" => $protección_social->id, "name" => "FUNDACION REGIONAL EL NIÑO SIMON DEL ESTADO GUARICO"],
            ["parent_id" => $protección_social->id, "name" => "FUNDACION ORQUESTA SINFONICA JUVENIL E INFANTIL DEL ESTADO GUARICO (FOSIJEG)"],
            ["parent_id" => $protección_social->id, "name" => "FUNDACION ORQUESTA SINFONICA DEL ESTADO GUARICO (FOSEG)"],
            ["parent_id" => $protección_social->id, "name" => "ENCOMUNA"],
            ["parent_id" => $protección_social->id, "name" => "RED DE BIBLIOTECAS PUBLICAS DEL ESTADO BOLIVARIANO DE GUARICO"],
            ["parent_id" => $salud_publica->id, "name" => "SECRETARIA DE SALUD PUBLICA"],
            ["parent_id" => $salud_publica->id, "name" => "FUNDACION PARA EL SERVICIO MEDICO INTEGRAL DEL ESTADO BOLIVARIANO DE GUARICO (FUSAMIEBG)"],
            ["parent_id" => $salud_publica->id, "name" => "ASOCIACIÓN CIVIL DE MEDICINA Y CIENCIAS DEL DEPORTE DEL ESTADO GUARICO (ASOMECID)"],
            ["parent_id" => $paz_territorial->id, "name" => "Secretaria de Seguridad y Defensa Ciudadana"],
            ["parent_id" => $paz_territorial->id, "name" => "DIRECCION DE PROTECCION CIVIL Y ADMINISTRACION DE DESASTRES"],
            ["parent_id" => $paz_territorial->id, "name" => "CUERPO DE BOMBEROS DEL ESTADO BOLIVARIANO DE GUARICO"],
            ["parent_id" => $paz_territorial->id, "name" => "INSTITUTO AUTONOMO DE LA POLICIA DEL ESTADO BOLIVARIANO DE GUARICO (IAPEBG)"],
            ["parent_id" => $paz_territorial->id, "name" => "INSTITUTO DE PREVISION SOCIAL DEL POLICIA DEL ESTADO GUARICO (IPSPEGUA)"],
            ["parent_id" => $paz_territorial->id, "name" => "CENTRO DE FORMACION POLICIAL DEL ESTADO BOLIVARIANO DE GUARICO (CEFOPOL)"],
            ["parent_id" => $privada->id, "name" => "RESIDENCIA OFICIAL DEL GOBERNADOR"],
            ["parent_id" => $privada->id, "name" => "UNIDAD AEREA"],
            ["parent_id" => $despacho->id, "name" => "DIRECCION GENERAL"],
            ["parent_id" => $despacho->id, "name" => "DIRECCION DE PROTOCOLO"],
            ["parent_id" => $despacho->id, "name" => "DIRECCION DE ADMINISTRACION"],
            ["parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION GENERAL DE AUDITORIA INTERNA"],
            ["parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION GENERAL DE ATENCION CIUDADANA"],
            ["parent_id" => $unid_de_apoyo->id, "name" => "DIRECCION DE CONSULTORIA JURIDICA"],
            ["parent_id" => $unid_de_apoyo->id, "name" => "DIRECCIÓN GENERAL DE INFORMATICA"],
            ["parent_id" => $secretaria_general->id, "name" => "SECRETARIA DE GESTION TERRITORIAL"],
            ["parent_id" => $secretaria_general->id, "name" => "DIRECCION DE ARCHIVO CENTRAL Y ACERVO HISTORICO"],
            ["parent_id" => $secretaria_general->id, "name" => "DIRECCION GENERAL DE TRANSPORTE"],
            ["parent_id" => $secretaria_general->id, "name" => "COMISION DE CONTRATACIONES PUBLICAS"],

        ];

        foreach ($secretarias as $sec) {
            Institution::create($sec);
        }
    }
}
