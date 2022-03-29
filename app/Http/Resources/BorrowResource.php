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
            'book' => $this->book->id,
            'borrower' => $this->borrower->id,
            'is_staff' => $this->staff,
            'date_borrowed' => $this->borrowed,
            'date_expected' => $this_expected,
            'date_returned' => $this->returned
        ];
    }
}
