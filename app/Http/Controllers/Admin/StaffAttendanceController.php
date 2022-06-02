<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffAttendance;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StaffAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('StaffAttendance/Index', );
    }

    public  function  create()
    {
        return Inertia::render(('StaffAttendance/Create'));
    }

    public function store()
    {

        StaffAttendance::create([
            'staff_id' => Request::input('staff_id'),
            'library_id' => Request::input('library_id'),
            'time_in' => Request::input('time_in'),
            'time_out' => Request::input('time_out'),
        ]);

        return redirect(route('admin.staff-attendance.index'))->with('flash.banner', 'Staff Attendance Created Successfully');
    }



    public  function edit(StaffAttendance $staffAttendance)
    {
        return Inertia::render('StaffAttendance/Edit', [
            'staff_attendance' => $staffAttendance
        ]);
    }

    public function update(StaffAttendance $staffAttendance)
    {

        $validated = Request::validate([
            'library_id' => 'required|exists:libraries,id',
            'staff_id' => 'required|exists:staffs,id',
            'time_in' => 'required',
            'time_out' => 'required'

        ]);

        $staffAttendance->update($validated);

        return redirect()->route('admin.staff-attendance.index')->with('flash.banner', 'Staff Attendance Updated Successfully');
    }

    public function destroy(StaffAttendance $staffAttendance)
    {
        $staffAttendance->delete();

        return redirect()->route('admin.staff-attendance.index')->with('flash.banner', 'Staff Attendance deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
