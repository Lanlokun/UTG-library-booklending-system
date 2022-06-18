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
            'borrow_staffs' => BorrowStaff::query()->where('staff_id', $staff->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('book_copy_id', 'like', "%{$search}%");
                })->with('book_copy', 'library')->paginate(5)->withQueryString(),
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
            'staff' => $staff,
            'libraries' => Library::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Staff $staff)
    {
        BorrowStaff::create([
            'book_copy_id' => Request::input('book_copy_id'),
            'library_id' => Request::input('library_id'),
            'staff_id' => $staff->id,
            'date_borrowed' => Request::input('date_borrowed'),
            'date_expected' => Request::input('date_expected'),
            'date_returned' => Request::input('date_returned'),

        ]);

//        $validated = Request::validate([
//
//            'book_copy_id' => 'required|exists:book_copies,id',
//            'library_id'  => 'required|exists:libraries,id',
//            'staff_id' =>  'required|exists:staffs,id',
//            'date_borrowed' => 'required | date',
//            'date_expected'=> 'required | date',
//            'date_returned' => 'date',
//        ]);
//
//        $borrowStaff->create($validated);

        return redirect(route('admin.staff-borrows.index', $staff->id))->with('flash.banner', 'Book Borrowed to Staff Successfully');

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
    public function edit(Staff $staff, $borrow_staff)
    {
        $borrow_staff = BorrowStaff::find($borrow_staff);

        return Inertia::render('Staff/Borrow/Edit', [
            'borrow_staff' => $borrow_staff,
            'book_copies' => BookCopy::get(),
            'libraries' => Library::get(),
            'staff' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Staff $staff, $borrowStaff)
    {

        $borrowStaff = BorrowStaff::find($borrowStaff);
        $validated = Request::validate([
            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id'  => 'required|exists:libraries,id',
            'staff_id' => $staff,
            'date_borrowed' => 'required',
            'date_expected'=> 'required',
            'date_returned' => 'required'
        ]);
        $borrowStaff->update($validated);

        return redirect()->route('admin.staff-borrows.index', $staff->id)->with('flash.banner', 'Book borrowed to staff updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff, $borrowStaff)
    {
        $borrowStaff = BorrowStaff::find($borrowStaff);

        $borrowStaff->delete();

        return redirect()->route('admin.staff-borrows.index', $staff->id)->with('flash.banner', 'Borrowed Book deleted Successfully')->with('flash.bannerStyle', 'danger');

    }
}
