<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\State;
use App\Domain\Tutorial\StateMachine;
use App\User;
use Illuminate\Queue\SerializesModels;
use App\Envelope;

class EnvelopeWasCreated extends AuditEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::ENVELOPE_CREATED;

    /**
     * Create a new audit event instance.
     *
     * @param Envelope $envelope
     * @param array $data
     */
    public function __construct(User $user, Envelope $envelope, $data = [])
    {
        $this->setUpAudit($envelope, $data);

        $tutorial = new StateMachine($user);
        if ($tutorial->can(State::CREATE_ENVELOPE)) {
            $tutorial->apply(State::CREATE_ENVELOPE);
            $tutorial->pushSave();
        }
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
