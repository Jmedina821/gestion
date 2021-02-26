<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'previous_value',
        'current_value',
        'user_id',
        'update_type_id',
    ];

    public function observation()
    {
        return $this->morphTo(Observation::class,'observations');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function update_type()
    {
        return $this->belongsTo(UpdateType::class);
    }
}
