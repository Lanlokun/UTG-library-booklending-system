<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use Illuminate\Http\Request;

use App\Models\Library;
use Inertia\Inertia;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::paginate();

        return Inertia::render('Admin/Library/Index', ['library' => $library]);
    }

    public function create()
    {
        return  Inertia::render('Admin/Library/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryRequest $request)
    {

        $data = $request->validated();

        Attendance::create($data);

        return redirect()->route('libraries.index')->with('success', 'Library successfully updated.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {

        return Inertia::render('Admin/Library/Show', ['library' => $library]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryRequest $request, Library $library)
    {
        $data = $request->validated();

        $library->update($data);

        return redirect()->route('libraries.index')->with('success', 'Library successfully updated.');

    }

    public function edit(Library $library)
    {

        return Inertia::render('Admin/Library/Edit', ['library' => $library]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();

        return redirect()->route('libraries.index')->with('success', 'Library delelted successfully.');

    }
}
