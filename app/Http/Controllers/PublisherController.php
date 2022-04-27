<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use Illuminate\Http\Request;

use App\Models\Publisher;
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
        $publisher = Publisher::get();

        return Inertia::render('Admin/Publisher/Index', ['publishers' => $publisher]);
    }


    public function create()
    {
        return  Inertia::render('Admin/Publisher/Create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        $data = $request->validated();

        Publisher::create($data);

        return redirect()->route('publisher.index')->with('success', 'Publisher successfully updated.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pubisher $publisher)
    {
        return Inertia::render('Admin/Publisher/Show', ['publisher' => $publisher]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $data = $request->validated();

        $publisher->update($data);

        return redirect()->route('publisher.index')->with('success', 'Publisher successfully updated.');

    }

    public function edit(Publisher $publisher)
    {
        return Inertia::render('Admin/Publisher/Edit', [
            'publisher' => [
                'id' => $publisher->id,
                'name' => $publisher->name,
                'country' => $publisher->country,
]

            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {

        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Publisher deleted successfully.');

    }
}
