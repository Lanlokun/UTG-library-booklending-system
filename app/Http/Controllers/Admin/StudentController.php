<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FetchUserAPI;
use App\Models\Student;
use Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Student/Index', [
            'students' => Student::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('mat_number', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render('Student/Create');
    }

    public function store()
    {

        Student::create([
            'student_id' => Request::input('student_id'),
            'name' => Request::input('name'),
            'mat_number' => Request::input('mat_number'),
            'department' => Request::input('department'),
            'email' => Request::input('email'),

        ]);

        return redirect(route('admin.students.index'))->with('flash.banner', 'Student Created Successfully');
    }



    public  function edit(Student $student)
    {
        return Inertia::render('Student/Edit', [
            'student' => $student
        ]);
    }

    public function update(Student $student)
    {

        $validated = Request::validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|max:255',
            'mat_number' => 'required',
            'department' => 'required|max:255',
            'email' => 'required|email',



        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')->with('flash.banner', 'Student Updated Successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')->with('flash.banner', 'Student deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
