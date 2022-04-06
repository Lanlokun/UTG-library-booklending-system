<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_copy = BookCopy::all();

        return Inertia::render('BookCopy', ['book_copy' => $book_copy]);
    }

    public function create()
    {
        return Inertia::render('BookCopy/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCopyRequest $request)
    {
        $data = $request->validated();

        BookCopy::create($data);

        return Redirect::route("book_copy.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BookCopy::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookCopyRequest $request, BookCopy $book_copy)
    {
        $data = $request->validated();

        $book_copy->update($data);

        return Redirect::route('book_copy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_copy->delete();
        return Redirect::route('book_copy.index');
    }
}
