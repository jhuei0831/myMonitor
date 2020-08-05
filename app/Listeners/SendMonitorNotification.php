<?php

namespace App\Listeners;

use App\Events\OrderMonitor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMonitorNotification
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
     * @param  OrderMonitor  $event
     * @return void
     */
    public function handle(OrderMonitor $event)
    {
        //
    }
}
