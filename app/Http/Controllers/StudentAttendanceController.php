<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\StudentAttendance;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_attendance = StudentAttendance::all();

        return Inertia::render('StudentAttendance', ['student_attendance' => $student_attendance]);

    }

    public function create()
    {

        return  Inertia::render('StudentAttendance/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentAttendanceRequest $request)
    {
        $data = $request->validated();

        StudentAttendance::create($data);

        return Redirect::route("student_attendance.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StudentAttendance::findOrFail($id);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentAttendanceRequest $request, StudentAttendance $student_attendance)
    {

        $data = $request->validated();

        $student_attendance->update($data);

        return Redirect::route('student_attendance.index');
    }

    public function edit($id)
    {
        $student_attendance = StudentAttendance::findOrFail($id);

        return Inertia::render('StudentAttendance/edit', ['student_attendance' => $student_attendance]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_attendance = StudentAtendance::find($id);

        $student_attendance->delete();

        return Redirect::route('student_attendance.index');
    }
}
