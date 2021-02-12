<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        "path"
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

}
