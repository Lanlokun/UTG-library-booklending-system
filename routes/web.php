<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopyController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return inertia('Welcome');
});
//Route::get('/admin', function(){
//    return inertia('Admin/Index');
//});


//Route::get('/users', [UserController::class, 'index']);
//Route::get('/users/{id}', [UserController::class, 'show']);
//Route::get('/users/create', [UserController::class, 'create']);
//Route::get('/users/edit', [UserController::class, 'edit']);
//Route::post('/users/create', [UserController::class, 'store']);
//Route::patch('/users/{id}', [UserController::class, 'update']);
//Route::post('/users/{id}', [UserController::class, 'delete']);
//
//
//Route::get('/staff_attendance', [StaffAttendanceController::class, 'index']);
//Route::get('/staff_attendance/{id}', [StaffAttendanceController::class, 'show']);
//Route::get('/staff_attendance/create', [StaffAttendanceController::class, 'create']);
//Route::get('/staff_attendance/edit', [StaffAttendanceController::class, 'edit']);
//Route::post('/staff_attendance/create', [StaffAttendanceController::class, 'store']);
//Route::patch('/staff_attendance/{id}', [StaffAttendanceController::class, 'update']);
//Route::post('/staff_attendance/{id}', [StaffAttendanceController::class, 'delete']);
//
//Route::get('/student_attendance', [StudentAttendanceController::class, 'index']);
//Route::get('/student_attendance/{id}', [StudentAttendanceController::class, 'show']);
//Route::get('/student_attendance/create', [StudentAttendanceController::class, 'create']);
//Route::get('/student_attendance/edit', [StudentAttendanceController::class, 'edit']);
//Route::post('/student_attendance/create', [StudentAttendanceController::class, 'store']);
//Route::patch('/student_attendance/{id}', [StudentAttendanceController::class, 'update']);
//Route::post('/student_attendance/{id}', [StudentAttendanceController::class, 'delete']);
//
//
//
//Route::get('/book', [BookController::class, 'index']);
//Route::get('/book/{id}', [BookController::class, 'show']);
//Route::get('/book/create', [BookController::class, 'create']);
//Route::get('/book/edit', [BookController::class, 'edit']);
//Route::post('/book/create', [BookController::class, 'store']);
//Route::patch('/book/{id}', [BookController::class, 'update']);
//Route::post('/book/{id}', [BookController::class, 'delete']);
//
//Route::get('/book/book_copies', [BookCopyController::class, 'index']);
//Route::get('/book/book_copies/{id}', [BookCopyController::class, 'show']);
//Route::get('/book/book_copies/create', [BookCopyController::class, 'create']);
//Route::get('/book/book_copies/edit', [BookCopyController::class, 'edit']);
//Route::post('/book/book_copies/create', [BookCopyController::class, 'store']);
//Route::patch('/book/book_copies/{id}', [BookCopyController::class, 'update']);
//Route::post('/book/book_copiesf/{id}', [BookCopyController::class, 'delete']);
//
//
//Route::get('/borrow', [BorrowController::class, 'index']);
//Route::get('/borrow/{id}', [BorrowController::class, 'show']);
//Route::get('/borrow/create', [BorrowController::class, 'create']);
//Route::get('/borrow/edit', [BorrowController::class, 'edit']);
//Route::post('/borrow/create', [BorrowController::class, 'store']);
//Route::patch('/borrow/{id}', [BorrowController::class, 'update']);
//Route::post('/users/{id}', [BorrowController::class, 'delete']);
//
//Route::get('/categories', [CategoryController::class, 'index']);
//Route::get('/categories/{id}', [CategoryController::class, 'show']);
//Route::get('/categories/create', [CategoryController::class, 'create']);
//Route::get('/categories/edit', [CategoryController::class, 'edit']);
//Route::post('/categories/create', [CategoryController::class, 'store']);
//Route::patch('/categories/{id}', [CategoryController::class, 'update']);
//Route::post('/categories/{id}', [CategoryController::class, 'delete']);
//
//Route::get('/library', [LibraryController::class, 'index']);
//Route::get('/library/{id}', [LibraryController::class, 'show']);
//Route::get('/library/create', [LibraryController::class, 'create']);
//Route::get('/library/edit', [LibraryController::class, 'edit']);
//Route::post('/library/create', [LibraryController::class, 'store']);
//Route::patch('/library/{id}', [LibraryController::class, 'update']);
//Route::post('/library/{id}', [LibraryController::class, 'delete']);
//
//Route::get('/publisher', [PublisherController::class, 'index']);
//Route::get('/publisher/{id}', [PublisherController::class, 'show']);
//Route::get('/publisher/create', [PublisherController::class, 'create']);
//Route::get('/publisher/edit', [PublisherController::class, 'edit']);
//Route::post('/publisher/create', [PublisherController::class, 'store']);
//Route::patch('/publisher/{id}', [PublisherController::class, 'update']);
//Route::post('/publisher/{id}', [PublisherController::class, 'delete']);
//
//Route::get('/report', [ReportController::class, 'index']);
//Route::get('/report/{id}', [ReportController::class, 'show']);
//Route::get('/report/create', [ReportController::class, 'create']);
//Route::get('/report/edit', [ReportController::class, 'edit']);
//Route::post('/report/create', [ReportController::class, 'store']);
//Route::patch('/report/{id}', [ReportController::class, 'update']);
//Route::post('/report/{id}', [ReportController::class, 'delete']);
//
//Route::get('/shelf', [ShelfController::class, 'index']);
//Route::get('/shelf/{id}', [ShelfController::class, 'show']);
//Route::get('/shelf/create', [ShelfController::class, 'create']);
//Route::get('/shelf/edit', [ShelfController::class, 'edit']);
//Route::post('/shelf/create', [ShelfController::class, 'store']);
//Route::patch('/shelf/{id}', [ShelfController::class, 'update']);
//Route::post('/shelf/{id}', [ShelfController::class, 'delete']);
//
//Route::get('/staff', [CategoryController::class, 'index']);
//Route::get('/staff/{id}', [CategoryController::class, 'show']);
//Route::get('/staff/create', [CategoryController::class, 'create']);
//Route::get('/staff/edit', [CategoryController::class, 'edit']);
//Route::post('/staff/create', [CategoryController::class, 'store']);
//Route::patch('/staff/{id}', [CategoryController::class, 'update']);
//Route::post('/staff/{id}', [CategoryController::class, 'delete']);
//
//Route::get('/staffattendance', [CategoryController::class, 'index']);
//Route::get('/staffattendance/{id}', [CategoryController::class, 'show']);
//Route::get('/staffattendance/create', [CategoryController::class, 'create']);
//Route::get('/staffattendance/create', [CategoryController::class, 'create']);
//Route::get('/staffattendance/edit', [CategoryController::class, 'edit']);
//Route::post('/staffattendance/create', [CategoryController::class, 'store']);
//Route::patch('/staffattendance/{id}', [CategoryController::class, 'update']);
//Route::post('/staffattendance/{id}', [CategoryController::class, 'delete']);
//
//Route::get('/student', [StudentController::class, 'index']);
//Route::get('/student/{id}', [StudentController::class, 'show']);
//Route::get('/student/create', [StudentController::class, 'create']);
//Route::get('/student/edit', [StudentController::class, 'edit']);
//Route::post('/student/create', [StudentController::class, 'store']);
//Route::patch('/student/{id}', [StudentController::class, 'update']);
//Route::post('/student/{id}', [StudentController::class, 'delete']);
//
//Route::get('/studentattendance', [StudentAttendanceController::class, 'index']);
//Route::get('/studentattendance/{id}', [StudentAttendanceController::class, 'show']);
//Route::get('/studentattendance/create', [StudentAttendanceController::class, 'create']);
//Route::get('/studentattendance/edit', [StudentAttendanceController::class, 'edit']);
//Route::post('/studentattendance/create', [StudentAttendanceController::class, 'store']);
//Route::patch('/studentattendance/{id}', [StudentAttendanceController::class, 'update']);
//Route::post('/studentattendance/{id}', [StudentAttendanceController::class, 'delete']);

Route::resources([

    'books' => BookController::class,
    'book-copies' => BookCopyController::class,
    'staff-attendance' => StaffAttendanceController::class,
    'student-attendance' => StudentAttendanceController::class,
    'borrow' => BorrowController::class,
    'category' => CategoryController::class,
    'library' => LibraryController::class,
    'publisher' => PublisherController::class,
    'report' => ReportController::class,
    'shelf' => ShelfController::class,
    'student' => StudentController::class,
    'staff' => StaffController::class,
    'user' => UserController::class,
    'post' => PostController::class


]);


Route::get('/dashboard', function () {
    return inertia('Admin/Index');
})->name('dashboard');

require __DIR__.'/auth.php';

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
