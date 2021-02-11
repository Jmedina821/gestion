<?php

namespace App\Http\Controllers;

use App\Http\Services\InvestmentAreaService;
use App\Http\Traits\ApiCrud;
use App\Models\InvestmentArea;
use Illuminate\Http\Request;

class InvestmentAreaController extends Controller
{
    use ApiCrud;
    private $invesmentAreaService;

    public function __construct()
    {
        $this->invesmentAreaService = new InvestmentAreaService;
    }
    public function model()
    {
        return InvestmentArea::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required'];
    }
}
