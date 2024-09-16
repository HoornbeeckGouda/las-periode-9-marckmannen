<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCarreer extends Model
{
    use HasFactory;

    public function courseYears()
    {
        return $this->belongsTo(CourseYear::class);
    }

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }

    public function subjectResults()
    {
        return $this->hasMany(SubjectResults::class);
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
