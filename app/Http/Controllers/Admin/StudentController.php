<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FetchUserAPI;
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

        $user = (new FetchUserAPI())->makeRequest(Request::input('email_address'));
//        dd($user);

        if (!$user == null) {
            Student::create([
                'fullName' => $user['name']['fullName'],
                'address' => $user['primaryEmail'],
            ]);
            return redirect(route('admin.students.index'))->with('flash.banner', 'Student Created');

        }
        else {
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
