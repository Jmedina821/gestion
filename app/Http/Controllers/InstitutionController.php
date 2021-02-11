<?php

namespace App\Http\Controllers;

use App\Http\Services\InstitutionService;
use App\Http\Traits\ApiCrud;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    use ApiCrud;

    private $institutionService;

    public function __construct()
    {
        $this->institutionService = new InstitutionService;
    }

    public function model()
    {
        return Institution::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required'];
    }
}
