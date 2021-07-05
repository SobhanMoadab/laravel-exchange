<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Core\Services\PriceServices;
use Composer\DependencyResolver\Request;

class PriceList implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  $price_list;

    public function __construct($price_list)
    {
        $this->price_list = $price_list;
    }

    // public function broadcastWith()
    // {
    //     return $this->price_list;
    //     $price_list = $this->price_list->get_all_prices();
    //     return ['price_list' => $price_list];
    // }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
  
    public function broadcastOn()
    {
        return new Channel('price');
    }
}
