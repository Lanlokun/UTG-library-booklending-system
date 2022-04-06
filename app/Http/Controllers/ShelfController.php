<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return Inertia::render('Shelf', ['shelf' => $shelf]);

    }

    public function create()
    {
        return Inertia::render('Shelf/create');
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

        return Inertia::render('publisher.index'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Shelf::find($id);
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

        return  Redirect::route('shelf.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shelf $shelf)
    {
         $shelf->delete();

         return redirect('shelf.index');
    }
}
