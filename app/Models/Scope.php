<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "scope", "module_id"];

    public function module() {
        return $this->belongsTo(Module::class);
    }

}
