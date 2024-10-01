<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolCareer extends Model
{
    use HasFactory;

    public function courseYear()
    {
        return $this->belongsTo(CourseYear::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subjectResult()
    {
        return $this->hasMany(SubjectResult::class);
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }






}
