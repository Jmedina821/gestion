<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentArea extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name"];

    public function investmentSubAreas()
    {
        return $this->hasMany(investmentSubAreas::class);
    }

}
