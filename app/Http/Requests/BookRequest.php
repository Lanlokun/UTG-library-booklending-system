<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'edition' => 'required|max:255',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'author_1' => 'required',
            'author_2' => 'required',
            'etla' => 'required',
            'place_of_pub' => 'required',
            'year' => 'required',
            'isbn' => 'required',
            'class_no' => 'required',
            'more_details' => 'required'
        ];
    }
}
