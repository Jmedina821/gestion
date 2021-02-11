<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "is_final"];

    protected $casts = ["is_final" => "boolean"];
}
