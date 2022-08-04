<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Request;
use Inertia\Inertia;

class LibraryController extends Controller
{
    public function index()
    {
        return Inertia::render('Library/Index', [
            'libraries' => Library::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  create()
    {
        return Inertia::render(('Library/Create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Library::create([
            'name' => Request::input('name'),
            'address' => Request::input('address'),
        ]);

        return redirect(route('admin.library.index'))->with('flash.banner', 'Library Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function edit(Library $library)
    {
        return Inertia::render('Library/Edit', [
            'library' => $library
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Library $library)
    {

        $validated = Request::validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        $library->update($validated);

        return redirect()->route('admin.library.index')->with('flash.banner', 'Library Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {

        $library->book_copies()->delete();
        $library->borrowStaffs()->delete();
        $library->borrowStaffs()->delete();
        $library->staff_attendances()->delete();
        $library->student_attendances()->delete();
        $library->delete();

        return redirect()->route('admin.library.index')->with('flash.banner', 'Library deleted Successfully')->with('flash.bannerStyle', 'danger');
    }
}
