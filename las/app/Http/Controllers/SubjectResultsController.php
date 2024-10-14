<?php

namespace App\Http\Controllers;

use App\Models\SubjectResult;
use App\Http\Requests\StoreSubjectResultsRequest;
use App\Http\Requests\UpdateSubjectResultsRequest;
use App\Models\Group;
use App\Models\schoolCareer;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::with(['schoolCareers.course', 'schoolCareers.courseYear', 'schoolCareers.group']);
    
        if ($request->has('groups') && !empty(array_filter($request->groups))) {
            $query->whereHas('schoolCareers.group', function ($q) use ($request) {
                $q->whereIn('group', $request->groups);
            });
        }

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('middle_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%');
            });
        }
    
        $students = $query->paginate(30);
    
        // Filter to get the latest school career for each student
        $students->each(function ($student) {
            $student->latestSchoolCareer = $student->schoolCareers->sortByDesc('courseYear.start_date')->first();
        });
    
        $groups = Group::all();
    
        return view('grading', compact('students', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $subjectResult = SubjectResult::updateOrCreate(
            [
                'subject_id' => $request->subject_id,
                'school_career_id' => $request->school_career_id,
            ],
            [
                'result' => $request->grade,
            ]
        );
        $subjectResult->save();

            return redirect()->route('grading');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectResultsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $student_id)
    {
        $student = Student::findOrFail($student_id);
        $user = Auth::user();
        $subjects = Subject::all();

        $teacher = Teacher::where('user_id', $user->id)->get();
        if (in_array($user->role_id, [2, 5])) {
            $subject = ['anything'];
        } else {
            $subject = $teacher->subject;
        }

        // $subject = $this->getTeacherSubject($user);
        $schoolCareer = $student->schoolCareers->sortByDesc('courseYear.start_date')->first();
        return view('students.grade', compact('student', 'user', 'subject', 'subjects', 'schoolCareer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectResult $subjectResults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectResultsRequest $request, SubjectResult $subjectResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectResult $subjectResults)
    {
        //
    }

    // public function getTeacherSubject($user)
    // {

    // }


}
