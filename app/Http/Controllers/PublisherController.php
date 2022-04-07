<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publisher = Publisher::all();

        return Inertia::render('Publisher', ['publisher' => $publisher]);
    }


    public function create()
    {
        return  Inertia::render('Publisher/create');
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
        return Publisher::find($id);
    }

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

        return Redirect('publisher.index');


    }

    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);

        return Inertia::render('Publisher/edit', ['publisher' => $publisher]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return Redirect('publisher.index');
    }
}
