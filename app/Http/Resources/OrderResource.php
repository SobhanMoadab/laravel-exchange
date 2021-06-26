<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'currency_id'=> $this->currency_id,
            'order_status' => $this->order_status,
            'invoice_id'=> $this->invoice_id,
            'data' => $this->data,
        ];
    }
}

 

      