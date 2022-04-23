<?php

namespace App\Http\Resources;

use App\Http\Controllers\GoogleController;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'roles' => $this->password,
            'tel' => $this->tel,
            'google' => GoogleController::collection($this->whenLoaded('users'))
        ];
    }
}
