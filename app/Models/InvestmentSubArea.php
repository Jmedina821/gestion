<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Uuid;

class InvestmentSubArea extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "investment_area_id"];

    public function investmentArea()
    {
        return $this->belongsTo(investmentArea::class);
    }
}
