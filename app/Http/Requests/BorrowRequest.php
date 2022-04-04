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
            'book_copy_id' => 'required',
            'library_id' => 'required',
            'student_id' => 'required',
            'staff_id' => 'required',
            'date_borrowed' => 'required',
            'date_expected' => 'required',
            'date_returned' => 'required'
        ];
    }
}