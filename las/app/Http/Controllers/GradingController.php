<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;

class GradingController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        $user = Auth::user();
        $subject = $this->getTeacherSubject()->id;
        $role = $user->role->name;
        return view('students.grade', compact('student', 'role', 'subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Student $student)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function getTeacherSubject()
    {
        $user = Auth::user();
        $teacher = Teacher::where('user_id', $user->id)->firstOrFail();
        $subject = $teacher->subject;
        return $subject;
    }
}
