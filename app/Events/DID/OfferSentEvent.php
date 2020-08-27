<?php

namespace App\Events\DID;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OfferSentEvent implements  ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $connection_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($connection_id)
    {
        $this->connection_id = $connection_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('add_did_'.$this->connection_id);
    }
}
