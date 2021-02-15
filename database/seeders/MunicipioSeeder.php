<?php

namespace Database\Seeders;

use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{

    public function run()
    {
        $roscio  =  Municipio::create(["code" => "M001", "name" => 'Juan Germán Roscio']);
        $miranda  =  Municipio::create(["code" => "M002", "name" => 'Francisco de Miranda']);
        $infante  =  Municipio::create(["code" => "M003", "name" => 'Leonardo Infante']);
        $zaraza  =  Municipio::create(["code" => "M004", "name" => 'Pedro Zaraza']);
        $monagas  =  Municipio::create(["code" => "M005", "name" => 'José Tadeo Monagas']);
        $ribas  =  Municipio::create(["code" => "M006", "name" => 'José Félix Ribas']);
        $camaguan  =  Municipio::create(["code" => "M007", "name" => 'Camaguán']);
        $mercedes  =  Municipio::create(["code" => "M008", "name" => 'Las Mercedes']);
        $socorro  =  Municipio::create(["code" => "M009", "name" => 'El Socorro']);
        $ortiz =  Municipio::create(["code" => "M010", "name" => 'Ortíz']);
        $guayabal =  Municipio::create(["code" => "M011", "name" => 'San Gerónimo de Guayabal']);
        $guaribe =  Municipio::create(["code" => "M012", "name" => 'San José de Guaribe']);
        $chaguaramas =  Municipio::create(["code" => "M013", "name" => 'Chaguaramas']);
        $santamaria =  Municipio::create(["code" => "M014", "name" => 'Santa María de Ipire']);
        $mellado =  Municipio::create(["code" => "M015", "name" => 'Julián Mellado']);

        Parroquia::create(["name" => "San Juan de los Morros", "code" => "P001", "municipio_id" => $roscio->id]);
        Parroquia::create(["name" => "Cantagallo", "code" => "P002", "municipio_id" => $roscio->id]);
        Parroquia::create(["name" => "Parapara", "code" => "P003", "municipio_id" => $roscio->id]);

        Parroquia::create(["name" => "Calabozo", "code" => "P004", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "El calvario", "code" => "P005", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "El Rastro", "code" => "P006", "municipio_id" => $miranda->id]);
        Parroquia::create(["name" => "Guardatinajas", "code" => "P007", "municipio_id" => $miranda->id]);

        Parroquia::create(["name" => "Valle de la Pascua", "code" => "P008", "municipio_id" => $infante->id]);
        Parroquia::create(["name" => "Espino", "code" => "P009", "municipio_id" => $infante->id]);

        Parroquia::create(["name" => "Zaraza", "code" => "P010", "municipio_id" => $zaraza->id]);
        Parroquia::create(["name" => "San José de Unare", "code" => "P011", "municipio_id" => $zaraza->id]);

        Parroquia::create(["name" => "Altagracia de Orituco", "code" => "P012", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "San Rafael de Orituco", "code" => "P013", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Lezama", "code" => "P014", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Paso Real de Macaira", "code" => "P015", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "San Francisco de Macaira", "code" => "P016", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Sabana Larga de Orituco", "code" => "P017", "municipio_id" => $monagas->id]);
        Parroquia::create(["name" => "Carlos Soublette", "code" => "P018", "municipio_id" => $monagas->id]);

        Parroquia::create(["name" => "Tucupido", "code" => "P019", "municipio_id" => $ribas->id]);
        Parroquia::create(["name" => "San Rafael de Laya", "code" => "P020", "municipio_id" => $ribas->id]);

        Parroquia::create(["name" => "Camaguan", "code" => "P021", "municipio_id" => $camaguan->id]);
        Parroquia::create(["name" => "Puerto Miranda", "code" => "P022", "municipio_id" => $camaguan->id]);
        Parroquia::create(["name" => "Uverito", "code" => "P023", "municipio_id" => $camaguan->id]);

        Parroquia::create(["name" => "Las Mercedes", "code" => "P024", "municipio_id" => $mercedes->id]);
        Parroquia::create(["name" => "Cabruta", "code" => "P025", "municipio_id" => $mercedes->id]);
        Parroquia::create(["name" => "Santa Rita de Manapire", "code" => "P026", "municipio_id" => $mercedes->id]);

        Parroquia::create(["name" => "El Socorro", "code" => "P027", "municipio_id" => $socorro->id]);

        Parroquia::create(["name" => "Ortiz", "code" => "P028", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San José de Tiznados", "code" => "P029", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San Francisco de Tiznados", "code" => "P030", "municipio_id" => $ortiz->id]);
        Parroquia::create(["name" => "San Lorenzo de Tiznados", "code" => "P031", "municipio_id" => $ortiz->id]);

        Parroquia::create(["name" => "Guayabal", "code" => "P032", "municipio_id" => $guayabal->id]);
        Parroquia::create(["name" => "Cazorla", "code" => "P033", "municipio_id" => $guayabal->id]);

        Parroquia::create(["name" => "Chaguaramas", "code" => "P034", "municipio_id" => $chaguaramas->id]);

        Parroquia::create(["name" => "Santa María de Ipire", "code" => "P035", "municipio_id" => $santamaria->id]);
        Parroquia::create(["name" => "Altamira", "code" => "P036", "municipio_id" => $santamaria->id]);

        Parroquia::create(["name" => "El Sombrero", "code" => "P037", "municipio_id" => $mellado->id]);
        Parroquia::create(["name" => "Sosa", "code" => "P038", "municipio_id" => $mellado->id]);

        Parroquia::create(["name" => "San José de Guaribe", "code" => "P039", "municipio_id" => $guaribe->id]);
    }
}
