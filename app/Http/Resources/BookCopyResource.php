<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\Library;
use App\Models\Shelf;
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
            'number' => $this->number,
            'books' => Book::collection($this->whenLoaded('books')),
            'libraries' => Library::collection($this->whenLoaded('libraries')),
            'shelves' => Shelf::collection($this->whenLoaded('shelves'))

        ];


    }
}
