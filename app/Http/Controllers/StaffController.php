<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Library;
use Illuminate\Http\Request;

use App\Models\Staff;
use Inertia\Inertia;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::paginate();

        return Inertia::render('Admin/Staff/Index', ['staff' => $staff]);
    }

    public function create()
    {
        return Inertia::render('Admin/Staff/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $data = $request->validated();

        Staff::create($data);

        return redirect()->route('staffs.index')->with('success', 'Staff successfully updated.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return Inertia::render('Admin/Staff/Show', ['staff' => $staff]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        $data = $request->validated();

        $staff->update($data);

        return Redirect::route('staffs.index');
    }

    public function edit(Staff $staff)
    {
        return Inertia::render('Admin/Staff/Edit', ['staff' => $staff]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff  deleted successfully');

    }
}
