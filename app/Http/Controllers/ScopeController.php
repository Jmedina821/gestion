<?php

namespace App\Http\Controllers;

use App\Http\Services\ScopeService;
use App\Http\Traits\ApiCrud;
use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    use ApiCrud;
    private $scopeService;

    public function __construct()
    {
        $this->scopeService = new ScopeService;
    }
    public function model()
    {
        return Scope::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
            'module_id' => 'required',
            'scope' => 'required'
        ];
    }
}
