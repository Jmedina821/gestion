<?php

namespace App\Http\Controllers;

use App\Http\Services\MeasurementService;
use App\Http\Traits\ApiCrud;
use App\Models\MeasurementUnit;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    use ApiCrud;
    private $measurementService;

    public function __construct()
    {
        $this->measurementService = new MeasurementService;
    }
    public function model()
    {
        return MeasurementUnit::class;
    }
    public function validationRules($resource_id = 0)
    {
        return ['name' => 'required', 'short_name' => 'required'];
    }
}
