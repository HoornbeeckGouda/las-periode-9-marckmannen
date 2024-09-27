<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\SubjectResult;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = Student::find($user->student_id);

        $results = SubjectResult::with(['subject', 'schoolCareer'])
        ->whereHas('schoolCareer', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })
        ->get();
    
        if ($user->role->name === 'student') {
            return view('dashboard_students', [
                'results' => $results,
                'user' => $user,
                'student' => $student,
            ]);
        } else {
            return view('dashboard', [
                'user' => $user,
                'student' => $student,
            ]);
        }
    }
}