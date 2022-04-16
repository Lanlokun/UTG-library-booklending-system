<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCopyRequest;
use Illuminate\Http\Request;

use App\Models\BookCopy;
use Inertia\Inertia;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_copy = BookCopy::paginate();

        return Inertia::render('Admin/BookCopy/Index', ['book_copy' => $book_copy]);
    }

    public function create()
    {
        return Inertia::render('Admin/BookCopy/Create');
    }

    /**
     * Store a newly created resource in storage.
     *the images
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCopyRequest $request)
    {
        $data = $request->validated();

        BookCopy::create($data);

        return Redirect::route("book-copy.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookCopy $book_copy)
    {
        return Inertia::render('Admin/BookCopy/Show', ['book_copy' => $book_copy]);
    }

    public function edit(BookCopy $book_copy)
    {
        return Inertia::render('Admin/BookCopy/Edit', ['book_copy' => $book_copy]);
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

        return redirect()->route('book-copies.index')->with('success', 'Book Copy successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCopy $book_copy)
    {
        $book_copy->delete();

        return redirect()->route('book-copies.index')->with('success', 'Book copy deleted successfully.');

    }
}
