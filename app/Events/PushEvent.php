<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PushEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  $user;
    
    /**
     * Create a new event instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return ['push-data'];
    }

    public function broadcastAs() {
        return 'push-event';
    }
}