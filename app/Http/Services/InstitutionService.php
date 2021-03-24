<?php

namespace App\Http\Services;

use App\Models\Institution;

class InstitutionService
{
    public function getAllInstitutions(string $onlyParent = null, $filter)
    {
        $institutions = new Institution;

        $user = auth()->user();

        if (isset($onlyParent)) {
            if (isset($user->institution_id)) {

                $user_institution = Institution::where('id', '=', $user->institution_id);
                $is_excecutive_institution = $user_institution->get()->first()->parent_id;




                if (!isset($is_excecutive_institution)) {

                    //If user belongs to a executive institution i.e : Major_secretary
                    if ($onlyParent === 'ejecutiva') {
                        $institutions = $user_institution;
                    } else {
                        $institutions = Institution::where('parent_id', '=', $user->institution_id);
                    }
                } else {

                    //If user belongs to a children institution
                    if ($onlyParent === 'ejecutiva') {
                        $user_parent_institution = Institution::where('id', '=', $user_institution->get()->first()->parent_id);
                        $institutions = $user_parent_institution;
                    } else {
                        $institutions = $user_institution;
                    }
                }
            } else {
                //If user does'nt belong to any Institution i.e : Super_admin
                $institutions = $institutions->where(
                    'parent_id',
                    $onlyParent == 'ejecutiva' ? null : $onlyParent
                );
            }
        }
        return $institutions->get();
    }
}
