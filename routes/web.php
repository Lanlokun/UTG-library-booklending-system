<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookCopyController;
//use App\Http\Controllers\Admin\BorrowController;
use App\Http\Controllers\Admin\BorrowStaffController;
use App\Http\Controllers\Admin\BorrowStudentController;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\MovieAttachController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\Admin\StaffAttendanceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentAttendanceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TvShowController;
//use App\Http\Controllers\Frontend\WelcomeController as FrontendWelcomeController;
//use App\Http\Controllers\Frontend\MovieController as FrontendMovieController;
//use App\Http\Controllers\Frontend\CastController as FrontendCastController;
//use App\Http\Controllers\Frontend\TVShowController as FrontendTvShowController;
//use App\Http\Controllers\Frontend\GenreController as FrontendGenreController;


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BorrowController;
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

//Route::get('/', [FrontendWelcomeController::class, 'index']);
//Route::get('/movies', [FrontendMovieController::class, 'index'])->name('movies.index');
//Route::get('/movies/{movie:slug}', [FrontendMovieController::class, 'show'])->name('movies.show');
//Route::get('/tv-shows', [FrontendTvShowController::class, 'index'])->name('tvShows.index');
////Route::get('/tv-shows/{tv-show:slug}', [FrontendTvShowController::class, 'show'])->name('tvShows.show');
////Route::get('/tv-shows/{tv-show:slug}/seasons/{season:slug}', [FrontendTvShowController::class, 'seasonShow'])->name('season.show');
//Route::get('/episodes/{episode:slug}', [FrontendTvShowController::class, 'showEpisode'])->name('frontepisodes.show');
//Route::get( '/casts', [FrontendCastController::class, 'index'])->name('casts.index');
//Route::get('/casts/{cast:slug}', [FrontendCastController::class, 'show'])->name('casts.show');
//Route::get('/genres/{genre:slug}', [FrontendGenreController::class, 'show'])->name('genres.show');


Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');



    Route::resource('/movies', MovieController::class);
    Route::get('/movies/{movie}/attach', [MovieAttachController::class, 'index'])->name('movies.attach');
    Route::post('/movies/{movie}/add-trailer', [MovieAttachController::class, 'addTrailer'])->name('movies.add.trailer');
    Route::delete('/trailer-urls/{trailer_url}', [MovieAttachController::class, 'destroyTrailer'])->name('trailers.destroy');
    Route::resource('/tv-shows', TvShowController::class);
    Route::resource('/tv-shows/{tv_show}/seasons', SeasonController::class);
    Route::resource('/tv-shows/{tv_show}/seasons/{season}/episodes', EpisodeController::class);
    Route::resource('/genres', GenreController::class);
    Route::resource('/casts', CastController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/books/{book}/book-copies', BookCopyController::class);
//    Route::resource('/books/{book}/book-copies/{book_copy}/borrows', BorrowController::class);

    Route::resource('/library', LibraryController::class);
    Route::resource('/shelves', ShelfController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/publishers', PublisherController::class);
    Route::resource('/posts', PostController::class);
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
        auth()->user()->assignRole('admin');
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
