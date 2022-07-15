<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->bikeable_type == "App\\Models\\ElectricBike"){
            $battery = $this->bikeable->battery;
            $resource = [
                'bike_id' => $this->id,
                'unlocked' => $this->unlocked,
                'battery' => $battery
            ];
        }
        else{
            $resource = [
                'bike_id' => $this->id,
                'unlocked' => $this->unlocked,
            ];
        }

        return $resource;
    }
}
