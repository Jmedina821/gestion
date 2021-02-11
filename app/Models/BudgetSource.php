<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetSource extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name"];

    public function budgets() 
    {
        return $this->hasMany(Budget::class);
    }
}
