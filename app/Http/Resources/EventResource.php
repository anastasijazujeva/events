<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date_and_time' => $this->date_and_time,
            'place' => $this->place,
            'category' => $this->category,
            'price' => $this->price,
            'description' => $this->description
        ];
    }
}
