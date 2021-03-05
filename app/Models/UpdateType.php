<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Uuid;

class UpdateType extends Model
{
    use HasFactory,Uuid;

    protected $fillable = [
        'name'
    ];

    public function Timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
