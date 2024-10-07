<?php

namespace App\Http\Controllers;

use App\Models\SubjectResult;
use App\Http\Requests\StoreSubjectResultsRequest;
use App\Http\Requests\UpdateSubjectResultsRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class SubjectResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::with(['schoolCareers.course', 'schoolCareers.courseYear', 'schoolCareers.group']);
    
        $students = $query->paginate(30);

        if ($request->has('groups') && !empty($request->groups)) {
            $query->whereHas('schoolCareers.group', function ($q) use ($request) {
                $q->whereIn('group', $request->groups);
            });
        }
    
        
    
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
    public function create()
    {
        //
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
    public function show(SubjectResult $subjectResults)
    {
        //
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
}
