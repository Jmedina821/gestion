<?php

namespace App\Http\Services;

use App\Models\Parroquia;

class ParroquiaService
{
    public function index(string $municipio_id = null)
    {
        $parroquias = new Parroquia;
        if (isset($municipio_id)) {
            $parroquias = $parroquias->where('municipio_id', '=', $municipio_id);
        }
        return $parroquias->get();
    }
}
