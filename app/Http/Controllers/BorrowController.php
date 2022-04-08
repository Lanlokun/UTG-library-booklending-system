<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Borrow;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrow = Borrow::all();

        return Inertia::render('Borrow/index', ['borrow' => $borrow]);
    }

    public function create()
    {
        return Inertia::render('Borrow/create');
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

        return Redirect::route("Borrow.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrow = Borrow::findOrFail($id);

        return Inertia::render('Borrow/show', ['borrow' => $borrow]);
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

        return Redirect::route('Borrow.index');
    }

    public function edit($id)
    {
        $borrow = Borrow::findOrFail($id);

        return Inertia::render('Borrow/edit', ['borrow' => $borrow]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return Redirect::route('Borrow.index');


    }
}
