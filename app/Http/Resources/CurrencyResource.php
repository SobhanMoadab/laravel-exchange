<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'is_active' => $this->is_active,
            'price' => $this->price,
            'min' => $this->min,
            'max' => $this->max,
        ];
    }
}
