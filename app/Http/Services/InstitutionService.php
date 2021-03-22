<?php

namespace App\Http\Services;

use App\Models\Institution;

class InstitutionService
{
    public function getAllInstitutions(string $onlyParent = null, $filter)
    {
        $institutions = new Institution;
        $user = auth()->user();
        if(isset($user->institution_id) ){
            if (isset($onlyParent)) {
                $user_institution = Institution::where('id','=',$user->institution_id);
                if($onlyParent === 'ejecutiva') {
                    $user_parent_institution = Institution::where('id','=',$user_institution->get()->first()->parent_id);
                    $institutions = $user_parent_institution;
                } else {
                    $institutions = $user_institution;
                }

        }} else {
            if (isset($onlyParent)) {
            $institutions = $institutions->where(
                'parent_id',
                $onlyParent == 'ejecutiva' ? null : $onlyParent
            );
        }}
        return $institutions->get();
    }
}
