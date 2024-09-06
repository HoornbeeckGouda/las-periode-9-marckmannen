<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseYear extends Model
{
    use HasFactory;

    public function schoolCarreer()
    {
        return $this->belongsTo(schoolCarreer::class);
    }
}
