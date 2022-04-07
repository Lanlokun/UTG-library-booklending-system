<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use app\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::all();

        return Inertia::render('Report', ['report' => $report]);

    }

    public function create()
    {
        return Inertia::render('Report/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $data = $request->validated();

        Report::create($data);

        return  Redirect::route('Report.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Report::findOrFail($id);

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

        return  Redirect::route('report.index');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return Inertia::render('Report/edit', ['report' => $report]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $report = Report::findKrFail($id);

        $report->delete();

        return Redirect::route('report.index');
    }
}
