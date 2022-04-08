<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return Inertia::render('Staff/index', ['staff' => $staff]);
    }

    public function create()
    {
        return Inertia::render('Staff/create');
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

        return Redirect::route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return Inertia::render('Staff/show', ['staff' => $staff]);    }

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

        return Redirect::route('Staff.index');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return Inertia::render('Staff/edit', ['staff' => $staff]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $staff = Staff::findOrFail($id);

        $staff->delete();

        return Redirect::route('Staff.index');
    }
}
