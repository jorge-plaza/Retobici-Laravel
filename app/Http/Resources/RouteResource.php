<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
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
            'user_id' => $this->user_id,
            'bike' => new BikeResource($this->bike()->first()),
            'initial_stop_id' => $this->initial_stop_id,
            'final_stop_id' => $this->final_stop_id,
            'distance' => $this->distance,
            'duration' => $this->duration,
            'points' => $this->points,
        ];
    }
}
