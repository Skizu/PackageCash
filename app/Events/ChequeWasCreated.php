<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\State;
use App\Domain\Tutorial\StateMachine;
use App\Http\Controllers\TutorialController;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Cheque;

class ChequeWasCreated extends AuditEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::CHEQUE_CREATED;

    /**
     * Create a new audit event instance.
     *
     * @param Cheque $cheque
     * @param array $data
     * @param User $user
     */
    public function __construct(User $user, Cheque $cheque, $data = [])
    {
        $this->setUpAudit($cheque, $data);

        $tutorial = new StateMachine($user);
        if ($tutorial->can(State::CREATE_CHEQUE)) {
            $tutorial->apply(State::CREATE_CHEQUE);
        }
        $tutorial->pushSave();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
