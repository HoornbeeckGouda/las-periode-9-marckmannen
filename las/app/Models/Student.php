<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function schoolCareers()
    {
        return $this->hasMany(schoolCareer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
