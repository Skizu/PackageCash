<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ChequeWasCreated' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\PackageWasCreated' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\EnvelopeWasCreated' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\EnvelopeWasRenamed' => [
            'App\Listeners\AddToAudit',
        ],
        'App\Events\EnvelopePackageWasAssigned' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\EnvelopePackageWasUnassigned' => [
            'App\Listeners\AddToAudit',
        ],
        'App\Events\TransferWasCreated' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\TutorialWasStarted' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\TutorialWasCompleted' => [
            'App\Listeners\AddToAudit',
            'App\Listeners\TutorialHandler',
        ],
        'App\Events\TransactionWasCreated' => [
            'App\Listeners\AddToAudit',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
