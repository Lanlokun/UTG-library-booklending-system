<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffAttendanceRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

use App\Models\StaffAttendance;
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
        $staff_attendance = StaffAttendance::paginate();

        return Inertia::render('Admin/StaffAttendance/Index', ['staff_attendance' => $staff_attendance]);

    }

    public function create()
    {

        return  Inertia::render('Admin/StaffAttendance/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffAttendanceRequest $request)
    {
        $data = $request->validated();

        StaffAttendance::create($data);

        return Redirect::route("staff-attendance.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StaffAttendance $staff_attendance)
    {

        return Inertia::render('Admin/StaffAttendance/show', ['staff_attendance' => $staff_attendance]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffAttendanceRequest $request, StaffAttendance $staff_attendance)
    {

        $data = $request->validated();

        $staff_attendance->update($data);

        return redirect()->route('staff-attendance.index')->with('success', 'successfully updated.');

    }

    public function edit(StaffAttendance $staff_attendance)
    {

        return Inertia::render('Admin/StaffAttendance/Edit', ['staff_attendance' => $staff_attendance]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffAttendance $staff_attendance)
    {
        $staff_attendance->delete();

        return redirect()->route('staff-attendance.index')->with('success', 'Successfully updated.');

    }
}
