<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\SchoolCarreer;

class SubjectResult extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function schoolCarreer()
    {
        return $this->belongsTo(SchoolCarreer::class);
    }
}
