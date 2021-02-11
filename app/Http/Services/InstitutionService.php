<?php

namespace App\Http\Services;

use App\Models\Institution;

class InstitutionService
{
    public function getAllInstitutions(string $onlyParent = null, $filter)
    {
        $institutions = new Institution;
        if (isset($onlyParent)) {
            $institutions = $institutions->where(
                'parent_id',
                $onlyParent == 'ejecutiva' ? null : $onlyParent
            );
        }
        return $institutions->get();
    }
}
