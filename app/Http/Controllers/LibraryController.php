<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Library;

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

        return Inertia::render('Library/index', ['library' => $library]);
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

        return Redirect('Library.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $library = Library::findOrFail($id);

        return Inertia::render('Library/show', ['library' => $library]);
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

    public function edit($id)
    {
        $library = Library::findOrFail($id);

        return Inertia::render('Library/edit', ['library' => $library]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $library = Library::findOrFail($id);

        $library->delete();

        return Redirect('Library.index');
    }
}
