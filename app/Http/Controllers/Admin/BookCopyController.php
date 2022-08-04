<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Library;
use App\Models\Shelf;
use Illuminate\Support\Facades\Redirect;
use Request;
use Inertia\Inertia;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        return Inertia::render('Books/BookCopy/Index', [
            'book_copies' => BookCopy::query()->where('book_id', $book->id)
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('number', 'like', "%{$search}%");
                })->with('book', 'library', 'shelf')->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'book' => $book
        ]);
    }

    public  function  create(Book $book)
    {
        return Inertia::render('Books/BookCopy/Create', [
            'books' => Book::get(),
            'libraries' => Library::get(),
            'book' => $book,
            'shelves' => Shelf::get()
        ]);
    }

    public function store(Book $book)
    {
        BookCopy::create([
            'number' => Request::input('number'),
            'book_id' => $book->id,
            'library_id' => Request::input('library_id'),
            'shelf_id' => Request::input('shelf_id')
        ]);

        return Redirect::route('admin.book-copies.index', $book->id)->with('flash.banner', 'Book Copy Created');
    }



    public  function edit(Book $book, BookCopy $bookCopy)
    {
        return Inertia::render('Books/BookCopy/Edit', [

            'book_copy' => [
                'id' => $bookCopy->id,
                'number' => $bookCopy->number,
                'libraries' => $bookCopy->when('libraries'),
                'shelves' => $bookCopy->when('shelves'),
            ],
            'libraries' => Library::get(),
            'shelves' => Shelf::get(),
            'book' => $book,
            'book_copy' => $bookCopy,


        ]);
    }

    public function update(Book $book, BookCopy $bookCopy)
    {

        $validated = Request::validate([
            'number' => 'required | integer',
            'library_id' => 'required|exists:libraries,id',
            'shelf_id' => 'required|exists:shelves,id',

        ]);

        $bookCopy->update($validated);
        return redirect()->route('admin.book-copies.index', $book->id)->with('flash.banner', 'Book Copy Updated');
    }

    public function destroy(Book $book , BookCopy $bookCopy)
    {
        $bookCopy->delete();

        return redirect()->back()->with('flash.banner', 'Book copy deleted')->with('flash.bannerStyle', 'danger');
    }
}
