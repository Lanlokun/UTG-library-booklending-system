<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\UserController;
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



Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'store']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}', [UserController::class, 'delete']);


Route::get('/staff_attendance', [StaffAttendanceController::class, 'index']);
Route::get('/staff_attendance/{id}', [StaffAttendanceController::class, 'show']);
Route::get('/staff_attendance/create', [StaffAttendanceController::class, 'create']);
Route::post('/staff_attendance/create', [StaffAttendanceController::class, 'store']);
Route::patch('/staff_attendance/{id}', [StaffAttendanceController::class, 'update']);
Route::post('/staff_attendance/{id}', [StaffAttendanceController::class, 'delete']);

Route::get('/student_attendance', [StudentAttendanceController::class, 'index']);
Route::get('/student_attendance/{id}', [StudentAttendanceController::class, 'show']);
Route::get('/student_attendance/create', [StudentAttendanceController::class, 'create']);
Route::post('/student_attendance/create', [StudentAttendanceController::class, 'store']);
Route::patch('/student_attendance/{id}', [StudentAttendanceController::class, 'update']);
Route::post('/student_attendance/{id}', [StudentAttendanceController::class, 'delete']);



Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::get('/book/create', [BookController::class, 'create']);
Route::post('/book/create', [BookController::class, 'store']);
Route::patch('/book/{id}', [BookController::class, 'update']);
Route::post('/book/{id}', [BookController::class, 'delete']);

Route::get('/book/book_copies', [BookCopyController::class, 'index']);
Route::get('/book/book_copies/{id}', [BookCopyController::class, 'show']);
Route::get('/book/book_copies/create', [BookCopyController::class, 'create']);
Route::post('/book/book_copies/create', [BookCopyController::class, 'store']);
Route::patch('/book/book_copies/{id}', [BookCopyController::class, 'update']);
Route::post('/book/book_copiesf/{id}', [BookCopyController::class, 'delete']);


Route::get('/borrow', [UserController::class, 'index']);
Route::get('/borrow/{id}', [UserController::class, 'show']);
Route::get('/borrow/create', [UserController::class, 'create']);
Route::post('/borrow/create', [UserController::class, 'store']);
Route::patch('/borrow/{id}', [UserController::class, 'update']);
Route::post('/users/{id}', [UserController::class, 'delete']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/create', [CategoryController::class, 'store']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);
Route::post('/categories/{id}', [CategoryController::class, 'delete']);

Route::get('/library', [CategoryController::class, 'index']);
Route::get('/library/{id}', [CategoryController::class, 'show']);
Route::get('/library/create', [CategoryController::class, 'create']);
Route::post('/library/create', [CategoryController::class, 'store']);
Route::patch('/library/{id}', [CategoryController::class, 'update']);
Route::post('/library/{id}', [CategoryController::class, 'delete']);

Route::get('/publisher', [CategoryController::class, 'index']);
Route::get('/publisher/{id}', [CategoryController::class, 'show']);
Route::get('/publisher/create', [CategoryController::class, 'create']);
Route::post('/publisher/create', [CategoryController::class, 'store']);
Route::patch('/publisher/{id}', [CategoryController::class, 'update']);
Route::post('/publisher/{id}', [CategoryController::class, 'delete']);

Route::get('/report', [CategoryController::class, 'index']);
Route::get('/report/{id}', [CategoryController::class, 'show']);
Route::get('/report/create', [CategoryController::class, 'create']);
Route::post('/report/create', [CategoryController::class, 'store']);
Route::patch('/report/{id}', [CategoryController::class, 'update']);
Route::post('/report/{id}', [CategoryController::class, 'delete']);

Route::get('/shelf', [CategoryController::class, 'index']);
Route::get('/shelf/{id}', [CategoryController::class, 'show']);
Route::get('/shelf/create', [CategoryController::class, 'create']);
Route::post('/shelf/create', [CategoryController::class, 'store']);
Route::patch('/shelf/{id}', [CategoryController::class, 'update']);
Route::post('/shelf/{id}', [CategoryController::class, 'delete']);

Route::get('/staff', [CategoryController::class, 'index']);
Route::get('/staff/{id}', [CategoryController::class, 'show']);
Route::get('/staff/create', [CategoryController::class, 'create']);
Route::post('/staff/create', [CategoryController::class, 'store']);
Route::patch('/staff/{id}', [CategoryController::class, 'update']);
Route::post('/staff/{id}', [CategoryController::class, 'delete']);

Route::get('/staffattendance', [CategoryController::class, 'index']);
Route::get('/staffattendance/{id}', [CategoryController::class, 'show']);
Route::get('/staffattendance/create', [CategoryController::class, 'create']);
Route::post('/staffattendance/create', [CategoryController::class, 'store']);
Route::patch('/staffattendance/{id}', [CategoryController::class, 'update']);
Route::post('/staffattendance/{id}', [CategoryController::class, 'delete']);

Route::get('/student', [CategoryController::class, 'index']);
Route::get('/student/{id}', [CategoryController::class, 'show']);
Route::get('/student/create', [CategoryController::class, 'create']);
Route::post('/student/create', [CategoryController::class, 'store']);
Route::patch('/student/{id}', [CategoryController::class, 'update']);
Route::post('/student/{id}', [CategoryController::class, 'delete']);

Route::get('/studentattendance', [StudentAttendanceController::class, 'index']);
Route::get('/studentattendance/{id}', [StudentAttendanceController::class, 'show']);
Route::get('/studentattendance/create', [StudentAttendanceController::class, 'create']);
Route::post('/studentattendance/create', [StudentAttendanceController::class, 'store']);
Route::patch('/studentattendance/{id}', [StudentAttendanceController::class, 'update']);
Route::post('/studentattendance/{id}', [StudentAttendanceController::class, 'delete']);


Route::get('/dashboard', function () {
    return inertia('Admin/Index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
