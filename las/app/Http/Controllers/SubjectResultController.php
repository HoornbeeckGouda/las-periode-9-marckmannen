<?php

namespace App\Http\Controllers;

use App\Models\SubjectResult;
use App\Http\Requests\StoreSubjectResultsRequest;
use App\Http\Requests\UpdateSubjectResultsRequest;

class SubjectResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
