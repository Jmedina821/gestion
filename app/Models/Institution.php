<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory, Uuid;

    protected $fillable = ["name", "parent_id", "sector_id", "mision", "vision", "code", "short_name"];

    protected $appends = ["parent"];

    public function getParentAttribute()
    {
        if(isset($this->parent_id)) {
            return Institution::find($this->parent_id);
        }
        return null;
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
    public function children()
    {
        return Institution::where('parent_id', $this->id)->get();
    }
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
