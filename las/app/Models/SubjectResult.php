<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\schoolCareer;

class SubjectResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'school_career_id',
        'result',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function schoolCareer()
    {
        return $this->belongsTo(schoolCareer::class);
    }
}
