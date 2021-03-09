<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'previous_value',
        'current_value',
        'user_id',
        'update_type_id',
    ];

    public function observation()
    {
        return $this->morphOne(Observation::class,'observationable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function update_type()
    {
        return $this->belongsTo(UpdateType::class);
    }

    public function timelineable()
    {
        return $this->morphTo();
    }
}
