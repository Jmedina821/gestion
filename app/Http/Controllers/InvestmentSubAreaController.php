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

    public function index(Request $request)
    {
        $investment_sub_area = new InvestmentSubArea();
        if (isset($request->investmentAreaIds)) {
            $investment_sub_area = $investment_sub_area->whereIn("investment_area_id", $request->investmentAreaIds);
        }

        return $investment_sub_area->get();
    }

    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required', 'investment_area_id' => 'required'];
    }
}
