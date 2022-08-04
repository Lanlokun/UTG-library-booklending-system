<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCopy;
use App\Models\BorrowStudent;
use App\Models\Library;
use App\Models\Staff;
use App\Models\Student;
use Request;
use Inertia\Inertia;

class BorrowStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {

        $borrowStudentCount = BorrowStudent::where([
            ['date_returned', null],
            ['student_id', $student->id],
        ])->count();
        return Inertia::render('Student/Borrow/Index', [
            'borrow_students' => BorrowStudent::query()->where('student_id', $student->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('book_copy_id', 'like', "%{$search}%");
                })->with('book_copy', 'library')->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'student' => $student, 'borrowStudentCount' => $borrowStudentCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        return Inertia::render('Student/Borrow/Create', [
            'book_copies' => BookCopy::get(),
            'student' => $student,
            'libraries' => Library::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Student $student, BorrowStudent $borrowStudent)
    {

        BorrowStudent::create([
            'book_copy_id' => Request::input('book_copy_id'),
            'library_id' => Request::input('library_id'),
            'student_id' => $student->id,
            'date_borrowed' => Request::input('date_borrowed'),
            'date_expected' => Request::input('date_expected'),
            'date_returned' => Request::input('date_returned'),

        ]);
//        $validated = Request::validate([
//
//            'book_copy_id' => 'required|exists:book_copies,id',
//            'library_id'  => 'required|exists:libraries,id',
//            'student_id'  => 'required|exists:students,id',
//            'date_borrowed' => 'required | date',
//            'date_expected'=> 'required | date',
//            'date_returned' => 'required | date',
//        ]);

//        $borrowStudent->create($validated);

        return redirect(route('admin.student-borrows.index', $student->id))->with('flash.banner', 'Book Borrowed to Student Successfully');

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
    public function edit(Student $student,$borrowStudent)
    {
        $borrowStudent = BorrowStudent::find($borrowStudent);
        return Inertia::render('Student/Borrow/Edit', [
            'borrow_student' => $borrowStudent,
            'book_copies' => BookCopy::get(),
            'libraries' => Library::get(),
            'student' => $student,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student,     $borrowStudent)
    {
        $borrowStudent = BorrowStudent::find($borrowStudent);
        $validated = Request::validate([
            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'student_id' => $student,
            'date_borrowed' => 'required',
            'date_expected'=> 'required',
            'date_returned' => 'sometimes'
        ]);
        $borrowStudent->update($validated);

        return redirect()->route('admin.student-borrows.index', $student->id)->with('flash.banner', 'Book borrowed to student updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $borrowStudent)
    {

        $borrowStudent = BorrowStudent::find($borrowStudent);
        $borrowStudent->delete();

        return redirect()->route('admin.student-borrows.index', $student->id)->with('flash.banner', 'Borrowed Book deleted Successfully')->with('flash.bannerStyle', 'danger');

    }
}
