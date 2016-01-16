<?php

namespace App\Events;

use App\Domain\Audit\EventType;
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
     * @param User $user
     * @param Envelope $envelope
     * @param array $data
     */
    public function __construct(Envelope $envelope, $data = [])
    {

        $this->setUpAudit($envelope, $data);
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
