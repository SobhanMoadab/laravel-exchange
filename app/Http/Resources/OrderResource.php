<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        return [
            'currency_id' => $this->currency_id,
            'order_status' => $this->order_status,
            'invoice_id' => $this->invoice_id,
            'data' => $this->data,
        ];
    }
}
