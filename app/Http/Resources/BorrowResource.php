<?php

namespace App\Http\Resources;

use App\Models\BookCopy;
use App\Models\Library;
use App\Models\Staff;
use App\Models\Student;
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
            'book_copies' => BookCopy::collection($this->whenLoaded('book_copies')),
            'libraries' => Library::collection($this->whenLoaded('libraries')),
            'students' => Student::collection($this->whenLoaded('students')),
            'staffs' => Staff::collection($this->whenLoaded('staffs')),
            'date_borrowed' => $this->borrowed,
            'date_expected' => $this_expected,
            'date_returned' => $this->returned
        ];
    }
}
