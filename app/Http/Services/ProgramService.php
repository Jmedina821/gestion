<?php

namespace App\Http\Services;

use App\Models\Program;

class ProgramService
{
    public function index($institution_id = null)
    {
        $programs = Program::with('institution');
        if (isset($institution_id)) {
            $programs = $programs->where('institution_id', $institution_id);
        }
        return $programs->get();
    }
}
