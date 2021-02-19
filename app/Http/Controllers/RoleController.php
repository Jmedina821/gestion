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

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return $role->load('scopes.module');
    }

    public function toggleScope(Request $request)
    {
        $role = Role::find($request->role_id);
        $scope = $role->scopes()->where('id', '=', $request->scope_id)->get()->first();
        $result = false;
        if(isset($scope)) {
            $role->scopes()->detach($request->scope_id);
        } else {
            $role->scopes()->attach($request->scope_id);
            $result = true;
        }

        return ["is_active" => $result];
    }
}
