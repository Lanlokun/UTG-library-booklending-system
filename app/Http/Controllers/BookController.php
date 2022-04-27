<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookCopyResource;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class BookController extends Controller
{

    public function index(): Response
    {
        $books = Book::get();

        return inertia('Admin/Book/Index', ['books' => $books]);
    }

    public function create(): Response
    {
        return inertia('Admin/Book/Create', [
            'publishers' => Publisher::get(),
            'categories' => Category::get()
        ]);
    }

    public function store(BookRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Book::create($data);

        return redirect()->route("books.index")->with('success', 'Book successfully added.');
    }

    public function show(Book $book): Response
    {
        return inertia('Admin/Book/Show', ['book' => $book]);
    }

    public function edit(Book $book): Response
    {

        $book = new BookCopyResource($book);
        return inertia('Admin/Book/Edit', [
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
                ]
            ]);
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book successfully updated.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book successfully deleted.');
    }
}
