<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'library_id' => 'required|exists:libraries,id',
            'staff_id' => 'required|exists:staffs,id',
            'time_in' => 'required',
            'time_out' => 'required'
        ];
    }
}
