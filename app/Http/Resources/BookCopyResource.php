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
            'copy' => $this->copy_id,
            'books' => Book::collection($this->whenLoaded('copies')),
            'libraries' => Library::collection($this->whenLoaded('libraries')),
            'shelves' => Shelf::collection($this->whenLoaded('shelves'))

        ];
        

    }
}
