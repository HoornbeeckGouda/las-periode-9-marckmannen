<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
