<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
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
            'staffs' => Staff::collection($this->whenLoaded('staffs')),
            'name' => $this->name,
            'email' => $this->email,
            'department' => $this->department
            
        ];
    }
}
