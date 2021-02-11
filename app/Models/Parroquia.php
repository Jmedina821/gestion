<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "municipio_id", "code"];

    public function municipio() {
        return $this->belongsTo(Municipio::class);
    }

}
