<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::all();

        return Inertia::render('Library', ['library' => $library]);
    }

    public function create()
    {
        return  Inertia::render('Library/create');
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

        return Redirect('library.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Library::find($id);
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

        return Redirect('library.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library,$id)
    {
        $library->delete();

        return Redirect('library.index');
    }
}
