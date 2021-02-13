<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'name',
        'description',
        'program_id',
        'measurement_id',
        'project_status_id',
        'measurement_value',
        'is_planified',
        'init_date',
        'end_date',
    ];

    protected $casts = [
        "is_planified" => 'boolean'
    ];

    protected $appends = ["total_activities"];

    public function getTotalActivitiesAttribute() {
        return Activity::where('project_id', $this->attributes["id"])->count();
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function program()
    {
        return  $this->belongsTo(Program::class);
    }

    public function investmentSubAreas()
    {
        return  $this->belongsToMany(InvestmentSubArea::class);
    }

    public function measurement()
    {
        return  $this->belongsTo(Measurement::class);
    }

    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}
