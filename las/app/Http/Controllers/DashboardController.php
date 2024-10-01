<?php
namespace App\Http\Controllers;

use App\Models\schoolCareer;
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
        $student = Student::with(['schoolCareers.course', 'schoolCareers.courseYear', 'schoolCareers.group'])->find($user->student_id);

        $results = [];
        if (isset($student)) {
            $query = SubjectResult::with(['subject', 'schoolCareer.course', 'schoolCareer.courseYear', 'schoolCareer.group'])
                ->whereHas('schoolCareer', function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                });

            if (request('schoolCareer')) {
                $query->where('school_career_id', request('schoolCareer'));
            }

            $results = $query->get()->groupBy('school_career_id');
        }
    
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