<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifiedCulminationDate extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'modified_date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function observation()
    {
        return $this->morphOne(Observation::class, 'observationable');
    }
}
