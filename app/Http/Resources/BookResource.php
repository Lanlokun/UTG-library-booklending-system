<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Publisher;
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
                 'title' => $this->title,
                 'edition' => $this->edition,
                 'categories' => Category::collection($this->whenLoaded('categories')),
                 'publishers' => Publisher::collection($this->whenLoaded('publishers')),
                 'author_1' => $this->author_1,
                 'author_2' => $this->author_2,
                 'etla' => $this->etla,
                 'place_of_pub' => $this->place_of_pub,
                 'year' => $this->year,
                 'isbn' => $this->isbn,
                 'class_no' => $this->class_no,
                 'more_details' => $this->more_details
             ];
    }
}
