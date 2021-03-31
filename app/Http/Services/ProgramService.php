<?php

namespace App\Http\Services;

use App\Models\Institution;
use App\Models\Program;

class ProgramService
{
    public function index($institution_id = null)
    {
        $programs = Program::with('institution');
        if (isset($institution_id)) {
            $institution = Institution::find($institution_id);
            if (isset($institution->parent_id)) {
                $programs = $programs->where('institution_id', $institution_id);
            } else {
                $programs = $programs->whereIn('institution_id', $institution->children()->pluck('id') ?? []);
            }
        }
        return $programs->get();
    }
}
