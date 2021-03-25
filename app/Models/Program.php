<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "description", "institution_id"];
    protected $appends = ["project_count"];

    public function getProjectCountAttribute()
    {
        return Project::where('program_id', $this->id)->count();
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
