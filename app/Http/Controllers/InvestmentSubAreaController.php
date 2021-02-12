<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ApiCrud;
use App\Models\InvestmentSubArea;

class InvestmentSubAreaController extends Controller
{
    use ApiCrud;

    public function model()
    {
        return InvestmentSubArea::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required', 'investment_area_id' => 'required'];
    }
}
