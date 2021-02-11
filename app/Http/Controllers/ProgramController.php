<?php

namespace App\Http\Controllers;

use App\Http\Services\ProgramService;
use App\Http\Traits\ApiCrud;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    use ApiCrud;

    private $programService;

    public function __construct()
    {
        $this->programService = new ProgramService;
    }

    public function index(Request $request)
    {
        return $this->programService->index($request->institution_id);
    }

    public function model()
    {
        return Program::class;
    }
    public function validationRules($resource_id = 0)
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'institution_id' => 'required'
        ];
    }
}
