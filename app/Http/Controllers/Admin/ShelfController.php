<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shelf;
use Request;
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
        return Inertia::render('Shelf/Index', [
            'shelves' => Shelf::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })->with('category')->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render('Shelf/Create', [
            'categories' => Category::get()
        ] );
    }

    public function store()
    {

        Shelf::create([
            'name' => Request::input('name'),
            'category_id' => Request::input('category_id'),
            'capacity' => Request::input('capacity')
        ]);

        return redirect(route('admin.shelves.index'))->with('flash.banner', 'Shelf Created Successfully');
    }



    public  function edit(Shelf $shelf)
    {
        return Inertia::render('Shelf/Edit', [
            'shelf' => $shelf,
            'categories' => Category::get()
        ]);
    }

    public function update(Shelf $shelf)
    {

        $validated = Request::validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'capacity' => 'required | integer'
        ]);

        $shelf->update($validated);

        return redirect()->route('admin.shelves.index')->with('flash.banner', 'Shelf Updated Successfully');
    }

    public function destroy(Shelf $shelf)
    {
        $shelf->delete();

        return redirect()->route('admin.shelves.index')->with('flash.banner', 'Shelf deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
