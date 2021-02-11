<?php

namespace App\Http\Controllers;

use App\Http\Services\RoleService;
use App\Http\Traits\ApiCrud;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use ApiCrud;
    private $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService;
    }
    public function model()
    {
        return Role::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
        ];
    }
}
