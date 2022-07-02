<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Request;
use Inertia\Inertia;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Publisher/Index', [
            'publishers' => Publisher::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render(('Publisher/Create'));
    }

    public function store()
    {

        Publisher::create([
            'name' => Request::input('name'),
            'country' => Request::input('country'),
            ]);

        return redirect(route('admin.publishers.index'))->with('flash.banner', 'Publisher Created Successfully');
    }



    public  function edit(Publisher $publisher)
    {
        return Inertia::render('Publisher/Edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(Publisher $publisher)
    {

        $validated = Request::validate([
            'name' => 'required|max:255',
            'country' => 'required|max:255'

        ]);

        $publisher->update($validated);

        return redirect()->route('admin.publishers.index')->with('flash.banner', 'Publisher Updated Successfully');
    }

    public function destroy(Publisher $publisher)
    {

        $publisher->books()->delete();
        $publisher->delete();

        return redirect()->route('admin.publishers.index')->with('flash.banner', 'Publisher deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
