<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "short_name"];

    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_measurement_units');
    }
}
