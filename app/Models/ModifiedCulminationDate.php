<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifiedCulminationDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'modified_date',
        'observation'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
