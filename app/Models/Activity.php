<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        "name",
        "project_id",
        "description",
        "parroquia_id",
        "gobernador",
        "conclusion",
        "address",
        "init_date",
        "end_date",
        "estimated_population",
        "benefited_population",
        "lat",
        "lng"
    ];

    protected $casts = ["gobernador" => 'boolean'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
