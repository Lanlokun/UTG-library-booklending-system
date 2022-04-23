<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAttendanceRequest;
use App\Models\Library;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Models\StudentAttendance;
use Inertia\Inertia;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_attendance = StudentAttendance::paginate();

        return Inertia::render('Admin/StudentAttendance/Index', ['student_attendance' => $student_attendance]);

    }

    public function create()
    {

        return  Inertia::render('Admin/StudentAttendance/Create', [
            'libraries' => Library::get(),
            'students' => Student::get(),]);

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

        return redirect()->route('student-attendance.index')->with('success', 'Student attendance successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $student_attendance)
    {

        return Inertia::render('Admin/StudentAttendance/Show', ['student_attendance' => $student_attendance]);

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

        return redirect()->route('student-attendance.index')->with('success', 'Student attendance successfully updated.');

    }

    public function edit(StudentAttendance $student_attendance)
    {

        return Inertia::render('Admin/StudentAttendance/Edit', ['student_attendance' => $student_attendance]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $student_attendance)
    {

        $student_attendance->delete();

        return redirect()->route('student-attendance.index')->with('success', 'Deleted successfully');

    }
}
