<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Request;
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
        return Inertia::render('Staff/Index', [
            'staffs' => Staff::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render(('Staff/Create'));
    }

    public function store()
    {

        Staff::create([
            'name' => Request::input('name'),
            'email' => Request::input('email'),
            'department' => Request::input('department'),
        ]);

        return redirect(route('admin.staffs.index'))->with('flash.banner', 'Staff Created Successfully');
    }



    public  function edit(Staff $staff)
    {
        return Inertia::render('Staff/Edit', [
            'staff' => $staff
        ]);
    }

    public function update(Staff $staff)
    {

        $validated = Request::validate([
            'staff_id' => 'required|exists:staffs,id',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'department' => 'required|max:255',


        ]);

        $staff->update($validated);

        return redirect()->route('admin.staffs.index')->with('flash.banner', 'Staff Updated Successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staffs.index')->with('flash.banner', 'Staff deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
