<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FetchUserAPI;
use App\Models\Staff;
use Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Staff/Index', [
            'staffs' => Staff::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('fullName', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render(('Staff/Create'));
    }

    private function parseEmailInput($email): array
    {
        if (! str_contains($email, '@'))
            $email .= '@utg.edu.gm';

        return [
            "email_address" => $email,
        ];
    }

    public function store()
    {


        $user = (new FetchUserAPI())->makeRequest(Request::input('email_address'));
        $staffEmail = Request::input('email_address');

        $staff = Staff::where('address', $this->parseEmailInput($staffEmail))->first();


        if($staff){
            return redirect(route('admin.staffs.index'))->with('flash.banner', 'Staff Already Exists');

        }
        if (!$user == null) {
            Staff::create([
                'fullName' => $user['name']['fullName'],
                'address' => $user['primaryEmail'],
            ]);
            return redirect(route('admin.staffs.index'))->with('flash.banner', 'Staff Created');

        }
        else {
            return redirect(route('admin.staffs.index'))->with('flash.banner', 'Api Error ')->with('flash.bannerStyle', 'danger');
        }

        return redirect(route('admin.staffs.index'))->with('flash.banner', 'Staff Created Successfully');
    }



    public  function edit(Staff $staff)
    {
        return Inertia::render('Staff/Edit', [
            'staff' => $staff
        ]);
    }

    public function update(Staff $staff)
    {

        $validated = Request::validate([
            'fullName' => 'required|max:255',
            'address' => 'required|max:255',


        ]);

        $staff->update($validated);

        return redirect()->route('admin.staffs.index')->with('flash.banner', 'Staff Updated Successfully');
    }

    public function destroy(Staff $staff)
    {
        $staff->borrowStaffs()->delete();
        $staff->staff_attendances()->delete();
        $staff->delete();

        return redirect()->route('admin.staffs.index')->with('flash.banner', 'Staff deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
