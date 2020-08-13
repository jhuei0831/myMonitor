<?php

namespace App\Listeners;

use App\Events\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNoticeNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderNotification  $event
     * @return void
     */
    public function handle(OrderNotification $event)
    {
        //
    }
}
