<?php

namespace App\Http\Controllers;

use App\Http\Services\ModuleService;
use App\Http\Traits\ApiCrud;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    use ApiCrud;

    private $moduleService;

    public function __construct()
    {
        $this->moduleService = new ModuleService;
    }

    public function index(Request $request)
    {
        $modules = Module::all();
        if(isset($request->withScopes)) {
            $modules = Module::with('scopes')->get();
        }
        return $modules;
    }

    public function model()
    {
        return Module::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required'];
    }
}
