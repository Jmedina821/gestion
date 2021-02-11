<?php

namespace App\Http\Controllers;

use App\Http\Services\BudgetService;
use App\Http\Traits\ApiCrud;
use App\Models\BudgetSource;
use Illuminate\Http\Request;

class BudgetSourceController extends Controller
{
    use ApiCrud;
    
    private $budgetService;

    public function __construct()
    {
        $this->budgetService = new BudgetService;
    }
    public function model()
    {
        return BudgetSource::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
        ];
    }
}
