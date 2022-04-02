<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'student_id' => $this->student->id,
            'library_id' => $this->library->id,
            'staff_id' => $this->staff->id,
            'time_in' => $this->time_in,
            'time_out' => $this->time_out
        ];
    }
}
