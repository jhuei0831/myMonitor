<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id, $title, $icon, $message, $footer, $width;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $title, $icon, $message, $footer, $width)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->icon = $icon;
        $this->message = $message;
        $this->footer = $footer;
        $this->width = (int) $width;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'.$this->user_id];
        // return [
        //     new PrivateChannel('App.Message.' . $this->message->to_user_id),
        //     new PrivateChannel('App.Message.'. $this->message->to_user_id .'.From.'. $this->message->from_user_id)
        // ];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
