<?php

namespace App\Http\Controllers;

use App\Http\Services\ParroquiaService;
use App\Http\Traits\ApiCrud;
use App\Models\Parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    use ApiCrud;

    private $parroquiaService;

    public function __construct()
    {
        $this->parroquiaService = new ParroquiaService;
    }
    public function model()
    {
        return Parroquia::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required', 'municipio_id' => 'required', 'code' => 'required'];
    }
}
