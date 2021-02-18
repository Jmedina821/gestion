<html>

<head>
  <meta charset="utf8">
  </meta>
</head>

<body>
  <style>
    * {
      font-family: arial;
      font-size: 14px;
    }
    td {
      padding: 3.5px 1.5px;
    }
    .full-w {
      width: 100%;
    }

    .bordered {
      border: 1px solid black;
      border-collapse: collapse;
    }

    .strong {
      font-weight: bold;
    }
    .title-style {
      background-color: #038DEF; color: #fff;
    }
    .image {
      margin: 3px;
    }
  </style>
  <table class="full-w">
    <tr>
      <td>
        REPUBLICA BOLIVARIANA DE VENEZUELA
        </br>
        GOBERNACIÓN DEL ESTADO BOLIVARIANO DE GUÁRICO
      </td>
      <td align="right">
        <img width="75" src="/var/www/html/actividades/api/public/guarico.png"></img>
      </td>
    </tr>
  </table>
  <br />
  <table class="full-w bordered">
    <tr>
      <td colspan="3" class="bordered title-style" align="center"><strong>FORMATO DE GESTIÓN DE GOBIERNO</strong></td>
    </tr>
    <tr>
      <td class="bordered strong title-style">1.1- SECRETARIA EJECUTIVA ADSCRITA:</td>
      <td colspan="2" class="bordered">{{$program['institution']['parent']['name']}}</td>
    </tr>
    <tr>
      <td class="bordered strong title-style">1.2- DENOMINACION DE LA DEPENDENCIA U ORGANISMO:</td>
      <td colspan="2" class="bordered">{{$program['institution']['name']}}</td>
    </tr>

    <tr>
      <td class="bordered strong title-style">1.3- MISIÓN:</td>
      <td class="bordered">{{$program['institution']['mision']}}</td>
      <td class="bordered" rowspan="2">1.5- AÑO {{\Carbon\Carbon::parse($init_date)->format('Y')}}</td>
    </tr>
    <tr>
      <td class="bordered strong title-style">1.4- VISIÓN:</td>
      <td class="bordered">{{$program['institution']['vision']}}</td>
    </tr>
  </table>
  <br />
  <table class="full-w bordered">
    <tr>
      <td class="title-style bordered strong">1.6 PROGRAMA:</td>
      <td class="title-style bordered strong">1.7 PROYECTO</td>
      <td class="title-style bordered strong">1.8 PLANIFICADO</td>
      <td class="title-style bordered strong">1.9 FECHA DE EJECUCIÓN</td>
    </tr>
    <tr>
      <td class="bordered">{{$program['name']}}</td>
      <td class="bordered">{{$name}}</td>
      <td class="bordered">{{$is_planified ? "SI" : "NO"}}</td>
      <td class="bordered">{{\Carbon\Carbon::parse($init_date)->format('d-m-Y')}} / {{\Carbon\Carbon::parse($end_date)->format('d-m-Y')}}</td>
    </tr>
    <tr>
      <td class="title-style bordered strong">1.10 MONTO DEL PROYECTO:</td>
      <td class="title-style bordered strong">1.11 FUENTES DE FINANCIAMIENTO</td>
      <td class="title-style bordered strong">1.12 AREAS DE INVERSIÓN</td>
      <td class="title-style bordered strong">1.13 ESTATUS</td>
    </tr>
    <tr>
      <td class="bordered">{{number_format($total_budget, 2, ",", ".")}} Bs</td>
      <td class="bordered">{{$budget_sources}}</td>
      <td class="bordered">{{$investment_areas}}</td>
      <td class="bordered">{{$project_status['name']}}</td>
    </tr>
  </table>
  <br/>
  <table class="full-w bordered">
    <tr>
      <td colspan="5" class="bordered title-style" align="center"><strong>2- ACTIVIDADES REALIZADAS PARA EL CUMPLIMIENTO DEL PROYECTO Y PROGRAMA</strong></td>
    </tr>
    <tr>
      <td class="title-style bordered strong">2.1 ACTIVIDAD</td>
      <td class="title-style bordered strong">2.2 MUNICIPIO</td>
      <td class="title-style bordered strong">2.3 PARROQUIA</td>
      <td class="title-style bordered strong">2.4 SECTOR</td>
      <td class="title-style bordered strong">2.5 BENEFICIADOS</td>
    </tr>
    @foreach($activities as $activity)
    <tr>
      <td class="bordered">{{$activity['name']}}</td>
      <td class="bordered">{{$activity['parroquia']['municipio']['name']}}</td>
      <td class="bordered">{{$activity['parroquia']['name']}}</td>
      <td class="bordered">{{$activity['address']}}</td>
      <td class="bordered">{{$activity['benefited_population']}}</td>
    </tr>
    @endforeach
    <tr>
    <td class="title-style bordered strong" colspan="5">
      2.9- MEMORIA FOTOGRAFICA
    </td>
    </tr>
  </table>
    @foreach($images ?? [] as $image)
      <img class="image" src="{{storage_path('app/'.$image)}}" width="250">
    @endforeach
    <br/>
  <table class="full-w bordered">
    <tr>
      <td class="title-style bordered strong" colspan="4">3- GRAFICAS</td>
    </tr>
    <tr>
      <td class="bordered" align="center"><img width="95" src="/var/www/html/actividades/api/public/chart-example.png"></img></td>
      <td class="bordered" align="center"><img width="95" src="/var/www/html/actividades/api/public/chart-example.png"></img></td>
      <td class="bordered" align="center"><img width="95" src="/var/www/html/actividades/api/public/chart-example.png"></img></td>
      <td class="bordered" align="center"><img width="95" src="/var/www/html/actividades/api/public/chart-example.png"></img></td>
    </tr>
    <tr>
      <td class="bordered title-style">UNIDAD DE MEDIDA</td>
      <td class="bordered title-style">INDICADOR DE GESTION</td>
      <td class="bordered title-style">EFICIENCIA</td>
      <td class="bordered title-style">EFICACIA</td>
    </tr>
  </table>
</body>

</html>
