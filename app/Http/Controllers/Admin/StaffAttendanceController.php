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
//        dd($staff);
        return Inertia::render('Staff/StaffAttendance/Index', [
            'staff_attendances' => StaffAttendance::query()->where('staff_id', $staff->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('time_in', 'like', "%{$search}%");
                })->with('library')->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'staff' => $staff
        ]);

    }

    public  function  create(Staff $staff)
    {
        return Inertia::render(('Staff/StaffAttendance/Create'), [
            'libraries' => Library::get(),
            'staff' => $staff
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


    public  function edit(Staff $staff, StaffAttendance $staffAttendance)
    {
        return Inertia::render('Staff/StaffAttendance/Edit', [
            'staff_attendance' => $staffAttendance,
            'staff' => $staff,
            'libraries' => Library::get()
        ]);
    }

    public function update(Staff $staff, StaffAttendance $staffAttendance)
    {

        $validated = Request::validate([
            'library_id' => 'required|exists:libraries,id',
            'time_in' => 'required',
            'time_out' => 'sometimes'

        ]);

        $staffAttendance->update($validated);

        return redirect()->route('admin.staff-attendance.index', $staff->id)->with('flash.banner', 'Staff Attendance Updated Successfully');
    }

    public function destroy(Staff $staff, StaffAttendance $staffAttendance)
    {
        $staffAttendance->delete();

        return redirect()->route('admin.staff-attendance.index', $staff)->with('flash.banner', 'Staff Attendance deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
