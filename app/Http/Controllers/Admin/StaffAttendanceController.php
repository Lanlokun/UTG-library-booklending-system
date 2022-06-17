<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\Staff;
use App\Models\StaffAttendance;
use Request;
use Inertia\Inertia;

class StaffAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Staff $staff)
    {
        return Inertia::render('Staff/StaffAttendance/Index', [
            'staffs' => StaffAttendance::query()->where('staff_id', $staff->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('time_in', 'like', "%{$search}%");
                })->with('library',)->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'staff' => $staff
        ]);

    }

    public  function  create(Staff $staff)
    {
        return Inertia::render(('Staff/StaffAttendance/Create'), [
            'libraries' => Library::get(),
            'staff' => $staff,
        ]);
    }

    public function store(Staff $staff)
    {
        StaffAttendance::create([
            'staff_id' => $staff->id,
            'library_id' => Request::input('library_id'),
            'time_in' => Request::input('time_in'),
            'time_out' => Request::input('time_out'),
        ]);

        return redirect(route('admin.staff-attendance.index', $staff->id))->with('flash.banner', 'Staff Attendance Created Successfully');
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
