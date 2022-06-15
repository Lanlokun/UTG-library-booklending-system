<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
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
                    $query->where('fullName', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render('Student/Create');
    }

    public function store(\Illuminate\Http\Request $request)
    {

        $student = Student::where('address', Request::input('email_address'))->first();
        if($student){
            return redirect(route('admin.students.index'))->with('flash.banner', 'Student Exists');

        }

        $header = $request->header('Authorization');
        $get_student_email = Http::asJson()->post(config('services.utg.endpoint').'get_user/' .Request::input('id') . '?api_key='. config('services.utg.secret') . '&language=en-US');

        if ($get_student_email->successful()) {
            Student::create([
                'student_id' => $get_student_email['id'],
                'fullName'    => $get_student_email['fullName'],
                'address' => $get_student_email['address'],
            ]);
            return redirect(route('admin.students.index'))->with('flash.banner', 'Student Created');

        }
        else {
            dd($get_student_email);
            return redirect(route('admin.students.index'))->with('flash.banner', 'Api Error ')->with('flash.bannerStyle', 'danger');
        }

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
            'fullName' => 'required|max:255',
            'address' => 'required',
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
