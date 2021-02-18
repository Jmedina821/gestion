<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "label"];

    public function scopes()
    {
        return $this->hasMany('App\Models\Scope');
    }
}
