<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "description", "institution_id"];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

}
