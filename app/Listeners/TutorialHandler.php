<?php

namespace App\Listeners;

use App\Domain\Tutorial\CanTutorial;
use App\Domain\Audit\EventType;
use App\Domain\Tutorial\State as TutorialState;
use App\Domain\Tutorial\StateMachine;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TutorialHandler
{
    private static $map = [
        EventType::USER_STARTED_TUTORIAL => 'Start',
        EventType::USER_COMPLETED_TUTORIAL => 'Skip',

        EventType::CHEQUE_CREATED => TutorialState::CREATE_CHEQUE,
        EventType::ENVELOPE_CREATED => TutorialState::CREATE_ENVELOPE,
        EventType::TRANSFER_CREATED => TutorialState::DISTRIBUTE_CHEQUE,
        EventType::PACKAGE_CREATED => TutorialState::CREATE_PACKAGE,
        EventType::ENVELOPE_PACKAGE_ASSIGNED => TutorialState::ASSIGN_PACKAGE,
    ];

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
     * @param  CanTutorial  $event
     * @return void
     */
    public function handle(CanTutorial $event)
    {
        $tutorial = new StateMachine($event->getUser());
        $state = self::$map[$event->getEventType()];

        if ($tutorial->can($state)) {
            $tutorial->apply($state);

            $tutorial->pushSave();
        }
    }
}
