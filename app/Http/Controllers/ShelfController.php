<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelfRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Shelf;
use Inertia\Inertia;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelf = Shelf::paginate();

        return Inertia::render('Admin/Shelf/Index', ['shelf' => $shelf]);
    }

    public function create()
    {
        return Inertia::render('Admin/Shelf/Create', [
            'categories' => Category::get(),
        ]);
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

        return redirect()->route('shelf.index')->with('success', 'Shelf successfully Created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shelf $shelf)
    {
        return Inertia::render('Admin/Shelf/Show', ['shelf' => $shelf]);
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

        return redirect()->route('shelves.index')->with('success', 'Shelf successfully updated.');

    }

    public function edit(Shelf $shelf)
    {

        return Inertia::render('Admin/Shelf/Edit', ['shelf' => $shelf]);
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

        return redirect()->route('shelves.index')->with('success', 'Shelf deleted successfully .');

    }
}
