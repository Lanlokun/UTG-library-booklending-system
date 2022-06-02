<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use Request;
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
        return Inertia::render('StudentAttendance/Index', [
            'student-attendances' => StudentAttendance::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);

    }

    public  function  create()
    {
        return Inertia::render(('StudentAttendance/Create'));
    }

    public function store()
    {

        StudentAttendance::create([
            'student_id' => Request::input('student_id'),
            'library_id' => Request::input('library_id'),
            'time_in' => Request::input('time_in'),
            'time_out' => Request::input('time_out'),


        ]);

        return redirect(route('admin.student-attendance.index'))->with('flash.banner', 'Student Attendance Created Successfully');
    }



    public  function edit(StudentAttendance $studentAttendance)
    {
        return Inertia::render('StudentAttendance/Edit', [
            'student_attendance' => $studentAttendance
        ]);
    }

    public function update(StudentAttendance $studentAttendance)
    {

        $validated = Request::validate([
            'student_id' => 'required|exists:students,id',
            'library_id' => 'required|exists:libraries,id',
            'time_in' => 'required',
            'time_out' => 'required'

        ]);

        $studentAttendance->update($validated);

        return redirect()->route('admin.student-attendance.index')->with('flash.banner', 'Student Attendance Updated Successfully');
    }

    public function destroy(StudentAttendance $studentAttendance)
    {
        $studentAttendance->delete();

        return redirect()->route('admin.student-attendance.index')->with('flash.banner', 'Student Attendance deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
