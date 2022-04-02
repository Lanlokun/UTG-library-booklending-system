<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookCopyResource extends JsonResource
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
            'copy_id' => $this->copy->id,
            'book_id' => $this->book->id,
            'library_id' => $this->library->id,
            'shelf_id' => $this->shelf->id

        ];
        

    }
}
