<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Borrow;
use App\Models\BorrowStaff;
use App\Models\BorrowStudent;
use App\Models\Publisher;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $publishers = Publisher::count();
        $books = BookCopy::count();
        $studentBorrows = BorrowStudent::count();
        $staffBorrows = BorrowStaff::count();
        $students = Student::count();
        $staffs =Staff::count();

        $borrows = $studentBorrows + $staffBorrows;

        return Inertia::render('Admin/Index', [
            'users_count' => $users_count,
            'publishers' => $publishers,
            'borrows' => $borrows,
            'books' => $books,
            'students' => $students,
            'staffs' => $staffs
        ]);
    }
}
