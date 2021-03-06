<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public $user_service;

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function index()
    {
        return $this->user_service->index();
    }

    public function update($id, Request $request) 
    {
        return $this->user_service->update($id, $request->all());
    }

    // User Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "password" => "required",
            "parent_institution" => "required",
            "role_id" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()], 400);
        }

        $inputs = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => $request->password,
            "institution_id" => isset($request->institution_id) ? $request->institution_id : $request->parent_institution,
            "role_id" => $request->role_id
        ];

        $inputs["password"] = Hash::make($request->password);

        $user   =   User::create($inputs);

        if (!is_null($user)) {
            return response()->json(["status" => "success", "message" => "Success! registration completed", "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "message" => "Registration failed!"]);
        }
    }

    // User login
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if (is_null($user)) {
            return response()->json(["status" => "failed", 
            "message" => "Failed! email not found"], 404);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $scopes = $user->role->scopes->map( function ($scope){
                return $scope["scope"];
            });
            $institution = $user->institution;
            $user["institution"] = $institution;
            $user["scopes"] = $scopes;
            $token = $user->createToken('token')->plainTextToken;

            return response()->json(["status" => "success", "login" => true, "token" => $token, "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! invalid password"], 401);
        }
    }


    // User Detail
    public function user()
    {
        $user = Auth::user();
        if (!is_null($user)) {
            return response()->json(["status" => "success", "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "message" => "Whoops! no user found"]);
        }
    }
}
