<?php

namespace App\Http\Controllers;

use App\Http\Services\MunicipioService;
use App\Http\Traits\ApiCrud;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    use ApiCrud;
    
    private $municipioService;

    public function __construct()
    {
        $this->municipioService = new MunicipioService;
    }
    public function model()
    {
        return Municipio::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required', 'code' => 'required'];
    }
}
