<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\Student;
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
    public function index(Student $student)
    {
        return Inertia::render('Student/StudentAttendance/Index', [
            'students' => StudentAttendance::query()->where('student_id', $student->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('student_id', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'student' => $student
        ]);

    }

    public  function  create(Student $student)
    {
        return Inertia::render(('Student/StudentAttendance/Create'),  [
            'libraries' => Library::get(),
            'student' => $student
        ]);
    }

    public function store(Student $student)
    {
        StudentAttendance::create([
            'student_id' => $student->id,
            'library_id' => Request::input('library_id'),
            'time_in' => Request::input('time_in'),
            'time_out' => Request::input('time_out'),


        ]);

        return redirect(route('admin.student-attendance.index', $student->id))->with('flash.banner', 'Student Attendance Created Successfully');
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
