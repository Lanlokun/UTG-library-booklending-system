<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BorrowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        return [
            'id' => $this->id,
            'book_copy_id' => $this->book_copy->id,
            'library_id' => $this->library->id,
            'student_id' => $this->student->id,
            'staff_id' => $this->staff->id,
            'date_borrowed' => $this->borrowed,
            'date_expected' => $this_expected,
            'date_returned' => $this->returned
        ];
    }
}
