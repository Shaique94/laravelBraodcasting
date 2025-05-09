<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ButtonClickedEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    // Constructor to pass any data
    public function __construct($message)
    {
        Log::info('Button clicked with message and inside event: ' . $message);
        $this->message = $message;
    }

    // Define the channel to broadcast on
    public function broadcastOn()
    {
        return new Channel('button-clicked');
    }
}
