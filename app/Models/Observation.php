<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory,Uuid;

    protected $fillable = [
        "description"
    ];

    public function observationable()
    {
        return $this->morphTo();
    }
}
