<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'address' => $this->address,
            'totalSpaces' => $this->total_spaces,
            'reserved_pedal_bikes' => $this->reserved_pedal_bikes(),
            'reserved_electric_bikes' => $this->reserved_electric_bikes(),
            'bikes' => BikeResource::collection($this->bikes()->get()),
        ];
    }
}
