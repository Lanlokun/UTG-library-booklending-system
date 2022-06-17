<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowStaff;
use App\Models\BorrowStudent;
use App\Models\Library;
use App\Models\BookCopy;

use App\Models\Staff;
use Request;
use Inertia\Inertia;

class BorrowStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Staff $staff)
    {
        return Inertia::render('Staff/Borrow/Index', [
            'borrows' => BorrowStaff::query()->where('staff_id', $staff->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('book_copy_id', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage']), 'staff' => $staff
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Staff $staff)
    {
        return Inertia::render('Staff/Borrow/Create', [
            'book_copies' => BookCopy::get(),
            'staffs' => $staff,
            'libraries' => Library::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowStaff $borrowStaff)
    {
        $validated = Request::validate([

            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'staff_id'  => 'required|exists:staffs,id',
            'date_borrowed' => 'required | date',
            'date_expected'=> 'required | date',
            'date_returned' => 'required | date',
        ]);

        $borrowStaff->create($validated);

        return redirect(route('admin.staff-borrows.index'))->with('flash.banner', 'Book Borrowed to Staff Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowStaff $borrowStaff)
    {
        return Inertia::render('Staff/Borrow/Edit', [
            'borrow_staff' => [
                'id' => $borrowStaff->id,
                'book_copies' => $borrowStaff->when('book_copies'),
                'libraries' => $borrowStaff->when('libraries'),
                'staffs' => $borrowStaff->when('staffs'),
                'date_borrowed' => $borrowStaff->date_borrowed,
                'date_expected' => $borrowStaff->date_expected,
                'date_returned' => $borrowStaff->date_returned,
            ],
            'book_copies' => BookCopy::get(),
            'libraries' => Library::get(),
            'staffs' => Staff::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowStaff $borrowStaff)
    {
        $validated = Request::validate([
            'boo_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'staff_id'  => 'required|exists:staffs,id',
            'date_borrowed' => 'required | date',
            'date_expected'=> 'required | date',
            'date_returned' => 'required | date',
        ]);

        $borrowStaff->update($validated);

        return redirect()->route('admin.staff-borrows.index')->with('flash.banner', 'Book borrowed to staff updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowStaff $borrowStaff)
    {
        $borrowStaff->delete();

        return redirect()->route('admin.staff-borrows.index')->with('flash.banner', 'Borrowed Book deleted Successfully')->with('flash.bannerStyle', 'danger');

    }
}
