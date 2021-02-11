<?php

namespace App\Http\Controllers;

use App\Http\Services\BudgetService;
use App\Http\Traits\ApiCrud;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    use ApiCrud;
    private $budgetService;

    public function __construct()
    {
        $this->budgetService = new BudgetService;
    }

    public function model()
    {
        return Budget::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'value' => 'required',
            'project_id' => 'required',
            'budget_source_id' => 'required',
        ];
    }
}
