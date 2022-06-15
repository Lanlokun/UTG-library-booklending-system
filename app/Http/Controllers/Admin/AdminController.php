<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $publishers = Publisher::count();
        $books = Book::count();
        $borrows = Borrow::count();
        return Inertia::render('Admin/Index', [
            'users_count' => $users_count,
            'publishers' => $publishers,
            'borrows' => $borrows,
            'books' => $books
        ]);
    }
}
