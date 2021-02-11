<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name"];

    public function scopes() {
        return $this->belongsToMany(Scope::class);
    }

}