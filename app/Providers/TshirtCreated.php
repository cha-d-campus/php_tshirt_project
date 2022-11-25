<?php

namespace App\Providers;

use App\Models\Tshirt;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TshirtCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The tshirt instance.
     *
     * @var \App\Models\Tshirt
     */
    public $tshirt;

    /**
     * Create a new event instance.
     * @param Tshirt $tshirt
     * @return void
     */
    public function __construct(Tshirt $tshirt)
    {
        $this->tshirt = $tshirt;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
