<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class BookController extends Controller
{

    public function index(): Response
    {
        $books = Book::paginate();

        return inertia('Admin/Book/Index', ['books' => $books]);
    }

    public function create(): Response
    {
        return inertia('Admin/Book/Create');
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
        return inertia('Admin/Book/Edit', ['book' => $book]);
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
