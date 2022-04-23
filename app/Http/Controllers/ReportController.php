<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Book;
use Request;

use App\Models\Report;
use Inertia\Inertia;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::paginate();

        return Inertia::render('Admin/Report/Index', ['report' => $report]);

    }

    public function create()
    {
        return Inertia::render('Admin/Report/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $file = Request::file('file_url')->store('reports', 'public');
        Report::create([
            'name' => Request::input('name'),
            'date' => Request::input('date'),
            'file_url' => $file
        ]);

        return redirect()->route('report.index')->with('success', 'Report successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {

        return Inertia::render('Admin/Report/Show', ['report' => $report]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request, Report $report)
    {
        $data = $request->validated();

        $report->update($data);

            return redirect()->route('reports.index')->with('success', 'Report successfully updated.');

    }

    public function edit(Report $report)
    {

        return Inertia::render('Admin/Report/Edit', ['report' => $report]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');

    }
}
