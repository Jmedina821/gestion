<?php

namespace App\Http\Controllers;

use App\Http\Services\SectorService;
use App\Http\Traits\ApiCrud;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    use ApiCrud;
    private $sectorService;

    public function __construct()
    {
        $this->sectorService = new SectorService;
    }
    public function model()
    {
        return Sector::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
        ];
    }
}
