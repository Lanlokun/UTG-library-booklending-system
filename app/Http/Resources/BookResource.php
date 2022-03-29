<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'author' => $this->author,
            'place_of_pub' => $this->place_of_pub,
            'publishers' => $this->publishers,
            'year' => $this->year,
            'isbn' => $this->isbn,
            'class_no' => $this->class_no,
            'no_of_copies' => $this->no_of_copies,
            'shelf_id' => $this->shelf->id
        ];
    }
}
