<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Project extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'name',
        'description',
        'program_id',
        'project_status_id',
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

    public function measurement_unit()
    {
        return  $this->belongsToMany(MeasurementUnit::class, 'project_measurement_units')->withPivot('proposed_goal','reached_goal','is_goal_increase','observation');
    }

    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function modified_culmination_dates()
    {
        return $this->hasMany(ModifiedCulminationDate::class);
    }

    public function timeline()
    {
        return $this->morphMany(Timeline::class, 'timelineable');
    }
}
