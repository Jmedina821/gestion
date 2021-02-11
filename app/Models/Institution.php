<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "parent_id", "sector_id"];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

}
