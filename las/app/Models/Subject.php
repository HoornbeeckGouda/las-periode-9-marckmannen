<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function subjectResults()
    {
        return $this->hasMany(SubjectResult::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class)->withDefault();
    }
}
