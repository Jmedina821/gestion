<?php

namespace App\Http\Controllers;

use App\Http\Services\ProgramService;
use App\Http\Traits\ApiCrud;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request,$id)
    {
        Validator::make($request->all(), $this->validationRules())->validate();

        $program = Program::find($id);
        $program->update($request->all());
        
        return $program;
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
