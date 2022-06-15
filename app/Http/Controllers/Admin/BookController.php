<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCopyResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Books/Index', [
            'books' => Book::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
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
        return Inertia::render('Books/Create', [
            'publishers' => Publisher::get(),
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book)
    {
        $validated = Request::validate([
            'title' => 'required|max:255',
            'edition' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'publisher_id'  => 'required|exists:publishers,id',
            'author_1'=> 'required',
            'author_2' => 'required',
            'etla' => 'required',
            'place_of_pub'=> 'required',
            'year' => 'required | integer',
            'isbn'=> 'required | integer',
            'class_no' => 'required | integer',
            'more_details' => 'sometimes',
        ]);

        $book->create($validated);

        return redirect(route('admin.books.index'))->with('flash.banner', 'Book Created Successfully');
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
    public  function edit(Book $book)
    {


        return Inertia::render('Books/Edit', [
            'book' => [
                'id' => $book->id,
                'title' => $book->title,
                'edition' => $book->edition,
                'categories' => $book->when('categories'),
                'publishers' => $book->when('publishers'),
                'author_1' => $book->author_1,
                'author_2' => $book->author_2,
                'etla' => $book->etla,
                'place_of_pub' => $book->place_of_pub,
                'year' => $book->year,
                'isbn' => $book->isbn,
                'class_no' => $book->class_no,
                'more_details' => $book->more_details,
            ],
            'categories' => Category::get(),
            'publishers' => Publisher::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book)
    {

        $validated = Request::validate([
            'title' => 'required|max:255',
            'edition' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'publisher_id'  => 'required|exists:publishers,id',
            'author_1'=> 'required',
            'author_2' => 'required',
            'etla' => 'required',
            'place_of_pub'=> 'required',
            'year' => 'required | integer',
            'isbn'=> 'required | integer',
            'class_no' => 'required | integer',
            'more_details' => 'sometimes',
        ]);

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('flash.banner', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.books.index')->with('flash.banner', 'Book deleted Successfully')->with('flash.bannerStyle', 'danger');
    }
}
