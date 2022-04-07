<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\StaffAttendance;

class StaffAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff_attendance = StaffAttendance::all();

        return Inertia::render('StaffAttendance', ['staff_attendance' => $staff_attendance]);

    }

    public function create()
    {

        return  Inertia::render('StaffAttendance/Create');

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

        return Redirect::route("staff_attendance.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StaffAttendance::findOrFail($id);


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

        return Redirect::route('staff_attendance.index');
    }

    public function edit($id)
    {
        $staff_attendance = StaffAttendance::findOrFail($id);

        return Inertia::render('StaffAttendance/edit', ['staff_attendance' => $staff_attendance]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff_attendance = StaffAtendance::find($id);

        $staff_attendance->delete();

        return Redirect::route('staff_attendance.index');
    }
}
