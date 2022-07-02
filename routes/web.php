<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookCopyController;
use App\Http\Controllers\Admin\BorrowStaffController;
use App\Http\Controllers\Admin\BorrowStudentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\Admin\StaffAttendanceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentAttendanceController;
use App\Http\Controllers\Admin\StudentController;


use App\Http\Controllers\Admin\UserController;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');


    Route::resource('/books', BookController::class);
    Route::resource('/books/{book}/book-copies', BookCopyController::class);

    Route::resource('/library', LibraryController::class);
    Route::resource('/shelves', ShelfController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/publishers', PublisherController::class);
    Route::resource('/staffs', StaffController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/students/{student}/student-attendance', StudentAttendanceController::class);
    Route::resource('/students/{student}/student-borrows', BorrowStudentController::class);

    Route::resource('/staffs/{staff}/staff-attendance', StaffAttendanceController::class);
    Route::resource('/staffs/{staff}/staff-borrows', BorrowStaffController::class);

    Route::resource('/user', UserController::class);


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


//Route::post('send-mail', 'MailController@sendMail')->name('mail');

