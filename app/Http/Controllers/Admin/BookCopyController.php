<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCopy;
use Request;
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
        return Inertia::render('Books/BookCopy/Index', [
            'book_copies' => BookCopy::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('number', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render(('BookCopy/Create'));
    }

    public function store()
    {
        BookCopy::create([
            'number' => Request::input('number'),
            'book_id' => Request::input('book_id'),
            'library_id' => Request::input('library_id'),
            'shelf_id' => Request::input('shelf_id')
        ]);

        return redirect(route('admin.tags.index'))->with('flash.banner', 'Tag Created');
    }



    public  function edit(BookCopy $bookCopy)
    {
        return Inertia::render('BookCopy/Edit', [
            'book_copy' => $bookCopy
        ]);
    }

    public function update(BookCopy $bookCopy)
    {

        $bookCopy->update([
            'number' => Request::input('number'),
            'book_id' => Request::input('book_id'),
            'library_id' => Request::input('library_id'),
            'shelf_id' => Request::input('shelf_id')

        ]);
        return redirect()->route('admin.book-copies.index')->with('flash.banner', 'BookCopy Updated');
    }

    public function destroy(BookCopy $bookCopy)
    {
        $bookCopy->delete();

        return redirect()->route('admin.book-copies.index')->with('flash.banner', 'Book copy deleted')->with('flash.bannerStyle', 'danger');
    }
}
