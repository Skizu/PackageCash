<?php

namespace App\Listeners;

use App\AuditLog;
use App\Events\AuditEvent;
use Auth;
use Illuminate\Events\Dispatcher;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddToAudit
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
     * @param  AuditEvent $event
     * @return void
     */
    public function handle(AuditEvent $event)
    {
        $message = $event->getMessage();
        AuditLog::create(['data' => $message]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        //
    }
}
