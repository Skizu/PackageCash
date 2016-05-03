<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\Domain\Tutorial\State;
use App\Domain\Tutorial\StateMachine;
use App\User;
use Illuminate\Queue\SerializesModels;
use App\Envelope;

class EnvelopeWasCreated extends AuditEvent implements CanTutorial
{
    use SerializesModels;

    /**
     * Create a new audit event instance.
     *
     * @param Envelope $envelope
     * @param array $data
     */
    public function __construct(User $user, Envelope $envelope, $data = [])
    {
        $this->setUpAudit($envelope, $data);
    }

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::ENVELOPE_CREATED;
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
