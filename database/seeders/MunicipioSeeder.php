<?php

namespace Database\Seeders;

use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{

    public function run()
    {
        $roscio  =  Municipio::create(["code" => "1", "name" => 'Juan Germán Roscio']);
        $miranda  =  Municipio::create(["code" => "2", "name" => 'Francisco de Miranda']);
        $infante  =  Municipio::create(["code" => "3", "name" => 'Leonardo Infante']);
        $zaraza  =  Municipio::create(["code" => "4", "name" => 'Pedro Zaraza']);
        $monagas  =  Municipio::create(["code" => "5", "name" => 'José Tadeo Monagas']);
        $ribas  =  Municipio::create(["code" => "6", "name" => 'José Félix Ribas']);
        $camaguan  =  Municipio::create(["code" => "7", "name" => 'Camaguán']);
        $mercedes  =  Municipio::create(["code" => "8", "name" => 'Las Mercedes']);
        $socorro  =  Municipio::create(["code" => "9", "name" => 'El Socorro']);
        $ortiz =  Municipio::create(["code" => "10", "name" => 'Ortíz']);
        $guayabal =  Municipio::create(["code" => "11", "name" => 'San Gerónimo de Guayabal']);
        $guaribe =  Municipio::create(["code" => "12", "name" => 'San José de Guaribe']);
        $chaguaramas =  Municipio::create(["code" => "13", "name" => 'Chaguaramas']);
        $santamaria =  Municipio::create(["code" => "14", "name" => 'Santa María de Ipire']);
        $mellado =  Municipio::create(["code" => "15", "name" => 'Julián Mellado']);

        Parroquia::create(["name" => "San Juan de los Morros", "code" => "1", "municipio_id" => $roscio->id]);
        Parroquia::create(["name" => "Cantagallo", "code" => "2", "municipio_id" => $roscio->id]);
        Parroquia::create(["name" => "Parapara", "code" => "3", "municipio_id" => $roscio->id]);

        Parroquia::create(["name" => "Calabozo", "code" => "1", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "El calvario", "code" => "2", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "El Rastro", "code" => "3", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "Guardatinajas", "code" => "4", "municipio_id" => $miranda->id]);

        Parroquia::create(["name" => "Valle de la Pascua", "code" => "1", "municipio_id" => $infante->id]);
        Parroquia::create(["name" => "Espino", "code" => "2", "municipio_id" => $infante->id]);

        Parroquia::create(["name" => "Zaraza", "code" => "1", "municipio_id" => $zaraza->id]);
        Parroquia::create(["name" => "San José de Unare", "code" => "2", "municipio_id" => $zaraza->id]);

        Parroquia::create(["name" => "Altagracia de Orituco", "code" => "1", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "San Rafael de Orituco", "code" => "2", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Lezama", "code" => "3", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Paso Real de Macaira", "code" => "4", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "San Francisco de Macaira", "code" => "5", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Sabana Larga de Orituco", "code" => "6", "municipio_id" => $monagas->id]);

        Parroquia::create(["name" => "Tucupido", "code" => "1", "municipio_id" => $ribas->id]);
        Parroquia::create(["name" => "San Rafael de Laya", "code" => "2", "municipio_id" => $ribas->id]);

        Parroquia::create(["name" => "Camaguan", "code" => "1", "municipio_id" => $camaguan->id]);
        Parroquia::create(["name" => "Puerto Miranda", "code" => "2", "municipio_id" => $camaguan->id]);
        Parroquia::create(["name" => "Uverito", "code" => "3", "municipio_id" => $camaguan->id]);

        Parroquia::create(["name" => "Las Mercedes", "code" => "1", "municipio_id" => $mercedes->id]);
        Parroquia::create(["name" => "Cabruta", "code" => "2", "municipio_id" => $mercedes->id]);
        Parroquia::create(["name" => "Santa Rita de Manapire", "code" => "3", "municipio_id" => $mercedes->id]);

        Parroquia::create(["name" => "El Socorro", "code" => "1", "municipio_id" => $socorro->id]);

        Parroquia::create(["name" => "Ortiz", "code" => "1", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San José de Tiznados", "code" => "2", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San Francisco de Tiznados", "code" => "3", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San Lorenzo de Tiznados", "code" => "4", "municipio_id" => $ortiz->id]);

        Parroquia::create(["name" => "Guayabal", "code" => "1", "municipio_id" => $guayabal->id]);
        Parroquia::create(["name" => "Cazorla", "code" => "2", "municipio_id" => $guayabal->id]);

        Parroquia::create(["name" => "Chaguaramas", "code" => "1", "municipio_id" => $chaguaramas->id]);

        Parroquia::create(["name" => "Santa María de Ipire", "code" => "1", "municipio_id" => $santamaria->id]);
        Parroquia::create(["name" => "Altamira", "code" => "2", "municipio_id" => $santamaria->id]);

        Parroquia::create(["name" => "El Sombrero", "code" => "1", "municipio_id" => $mellado->id]);
        Parroquia::create(["name" => "Sosa", "code" => "2", "municipio_id" => $mellado->id]);

        Parroquia::create(["name" => "San José de Guaribe", "code" => "1", "municipio_id" => $guaribe->id]);
    }
}
