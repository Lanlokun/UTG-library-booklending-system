<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCopy;
use App\Models\BorrowStudent;
use App\Models\Library;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Student/Borrow/Index', [
            'borrows' => BorrowStudent::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('book_copy_id', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Student/Borrows/Create', [
            'book_copies' => BookCopy::get(),
            'students' => Student::get(),
            'libraries' => Library::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowStudent $borrowStudent)
    {
        $validated = Request::validate([

            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'student_id'  => 'required|exists:students,id',
            'date_borrowed' => 'required | date',
            'date_expected'=> 'required | date',
            'date_returned' => 'required | date',
        ]);

        $borrowStudent->create($validated);

        return redirect(route('admin.student-borrows.index'))->with('flash.banner', 'Book Borrowed to Student Successfully');

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
    public function edit(BorrowStudent $borrowStudent)
    {
        return Inertia::render('Student/Borrow/Edit', [
            'borro_student' => [
                'id' => $borrowStudent->id,
                'book_copies' => $borrowStudent->when('book_copies'),
                'libraries' => $borrowStudent->when('libraries'),
                'students' => $borrowStudent->when('students'),
                'date_borrowed' => $borrowStudent->date_borrowed,
                'date_expected' => $borrowStudent->date_expected,
                'date_returned' => $borrowStudent->date_returned,
            ],
            'book_copies' => BookCopy::get(),
            'libraries' => Library::get(),
            'students' => Student::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowStudent $borrowStudent)
    {
        $validated = Request::validate([
            'boo_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'student_id'  => 'required|exists:students,id',
            'date_borrowed' => 'required | date',
            'date_expected'=> 'required | date',
            'date_returned' => 'required | date',
        ]);

        $borrowStudent->update($validated);

        return redirect()->route('admin.student-borrows.index')->with('flash.banner', 'Book borrowed to student updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowStudent $borrowStudent)
    {
        $borrowStudent->delete();

        return redirect()->route('admin.student-borrows.index')->with('flash.banner', 'Borrowed Book deleted Successfully')->with('flash.bannerStyle', 'danger');

    }
}
