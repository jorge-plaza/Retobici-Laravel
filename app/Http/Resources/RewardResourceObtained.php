<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RewardResourceObtained extends JsonResource
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
            "id"=> $this->id,
            "title"=> $this->name,
            "description"=> $this->description,
            "points"=> $this->points,
            "image" => $this->image,
            "obtained" => true,
        ];
    }
}
