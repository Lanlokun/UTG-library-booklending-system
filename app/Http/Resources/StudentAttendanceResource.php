<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentAttendanceResource extends JsonResource
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
            'libraries' => Library::collection($this->whenLoaded('libraries')),
            'student' => Student::collection($this->whenLoaded('students')),
            'time_in' => $this->time_in,
            'time_out' => $this->time_out
        ];
    }
}
