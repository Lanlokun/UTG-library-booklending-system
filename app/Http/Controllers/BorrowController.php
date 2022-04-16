<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowRequest;
use Illuminate\Http\Request;

use App\Models\Borrow;
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
        $borrow = Borrow::paginate();

        return Inertia::render('Admin/Borrow/Index', ['borrow' => $borrow]);
    }

    public function create()
    {
        return Inertia::render('Admin/Borrow/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowRequest $request)
    {
        $data = $request->validated();

        Borrow::create($data);

        return redirect()->route('borrows.index')->with('success', 'Book successfully updated.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {

        return Inertia::render('Admin/Borrow/Show', ['borrow' => $borrow]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowRequest $request, Borrow $borrow)
    {
        $data = $request->validated();

        $borrow->update($data);

        return redirect()->route('borrows.index')->with('success', 'successfully updated.');

    }

    public function edit(Borrow $borrow)
    {
        return Inertia::render('Admin/Borrow/Edit', ['borrow' => $borrow]);
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

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');

    }
}
