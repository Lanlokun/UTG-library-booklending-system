<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Shelf;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelf = Shelf::all();

        return Inertia::render('Shelf/index', ['shelf' => $shelf]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShelfRequest $request)
    {
        $data = $request->validated();

        Shelf::create($data);

        return Inertia::render('shelf.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shelf = Shelf::findOrFail($id);

        return Inertia::render('Shelf/show', ['shelf' => $shelf]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShelfRequest $request, Shelf $shelf)
    {
        $data = $request->validted();

        $shelf->update($data);

        return  Redirect::route('Shelf.index');

    }

    public function edit($id)
    {
        $shelf = Shelf::findOrFail($id);

        return Inertia::render('Shelf/edit', ['shelf' => $shelf]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $shelf = Shelf::findOrFail($id);

        $shelf->delete();

         return redirect('Shelf.index');
    }
}
