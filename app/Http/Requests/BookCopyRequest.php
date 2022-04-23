<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCopyRequest extends FormRequest
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
            'number' => 'required',
            'book_id' => 'required|exists:books,id',
            'library_id' => 'required|exists:libraries,id',
            'shelf_id' => 'required|exists:shelves,id',
        ];
    }
}
