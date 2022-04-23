<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
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
            'book_copy_id' => 'required|exists:book_copies,id',
            'library_id' => 'required|exists:libraries,id',
            'student_id' => 'required|exists:students,id',
            'staff_id' => 'required|exists:staffs,id',
            'date_borrowed' => 'required',
            'date_expected' => 'required',
            'date_returned' => 'required'
        ];
    }
}
