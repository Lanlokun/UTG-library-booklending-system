<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Request;
use Inertia\Inertia;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Visitor/Index', [
            'visitors' => Visitor::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  create()
    {
        return Inertia::render(('Visitor/Create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Visitor $visitor)
    {

        $validated = Request::validate([
            'name' => 'required|max:255',
            'number' => 'required|integer',
            'from' => 'required|max:255|string',
        ]);

        Visitor::create([
            'name' => $validated['name'],
            'number' => $validated['number'],
            'from' => $validated['from'],
        ]);

        return redirect(route('admin.visitor.index'))->with('flash.banner', 'Visitor Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function edit(Visitor $visitor)
    {
        return Inertia::render('Visitor/Edit', [
            'visitor' => $visitor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Visitor $visitor)
    {

        $validated = Request::validate([
            'name' => 'required|max:255',
            'number' => 'required|integer',
            'from' => 'required|max:255|string',

        ]);

        $visitor->update($validated);

        return redirect()->route('admin.visitor.index')->with('flash.banner', 'Visitor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        return redirect()->route('admin.visitor.index')->with('flash.banner', 'visitor deleted Successfully')->with('flash.bannerStyle', 'danger');
    }
}
