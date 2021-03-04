<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
       'value',
       'dollar_value',
       'project_id',
       'budget_source_id',
       'is_budget_increase'
    ];

    protected $casts = ["is_budget_increase" => "boolean"];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function budgetSource() {
        return $this->belongsTo(BudgetSource::class);
    }

    public function observation()
    {
        return $this->morphOne(Observation::class, 'observationable');
    }

}
