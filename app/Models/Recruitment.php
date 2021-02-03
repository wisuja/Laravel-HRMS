<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function position () {
        return $this->belongsTo(Position::class);
    }

    public function recruitmentCanditate() 
    {
        return $this->hasMany(RecruitmentCandidate::class);
    }

    public function get($count = 3) {
        return $this->latest()->take($count)->get();
    }

    public function paginate($count = 10) {
        return $this->with('position')->latest()->paginate($count);
    }
}
