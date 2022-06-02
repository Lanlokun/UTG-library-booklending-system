<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCopy;
use App\Models\Borrow;
use App\Models\Library;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Borrows/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  create()
    {
        return Inertia::render('Borrow/Create', [
            'book-copies' => BookCopy::get(),
            'libraries' => Library::get(),
//            'students' => Student::get(),
//            'staffs' => Staff::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Borrow::create([
            'book_copy_id' => Request::input('book_copy_id'),
            'library_id' => Request::input('library_id'),
            'student_id' => Request::input('student_id'),
            'staff_id' => Request::input('staff_id'),
            'date_borrowed' => Request::input('date_borrowed'),
            'date_expected' => Request::input('date_returned'),
            'date_returned' => Request::input('date_returned'),
        ]);

        return redirect(route('admin.borrows.index'))->with('flash.banner', 'Borrow Created Successfully');
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
    public  function edit(Borrow $borrow)
    {
        return Inertia::render('Borrows/Edit', [
            'borrow' => $borrow
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Borrow $borrow)
    {

        $validated = Request::validate([
            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id' => 'required|exists:libraries,id',
            'student_id' => 'required|exists:students,id',
            'staff_id' => 'required|exists:staffs,id',
            'date_borrowed' => 'required',
            'date_expected' => 'required',
            'date_returned' => 'required'
        ]);

        $borrow->update($validated);

        return redirect()->route('admin.borrows.index')->with('flash.banner', 'Borrow Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();

        return redirect()->route('admin.borrows.index')->with('flash.banner', 'Borrow deleted Successfully')->with('flash.bannerStyle', 'danger');
    }

}
