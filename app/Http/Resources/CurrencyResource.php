<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
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
            "id"=> $this->id,
            "name"=> $this->name,
            "icon"=> $this->icon,
            "is_active"=> $this->is_active,
            "price" => $this->price,
            "min" => $this->min,
            "max" => $this->max,
        ];
    }
}
