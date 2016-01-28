<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopeUpdateEvent extends AuditEvent
{
    use SerializesModels;

    /**
     * Create a new audit event instance.
     *
     * @param Envelope $envelope
     * @param array $data
     */
    public function __construct(Envelope $envelope, $data = [])
    {
        $this->setUpAudit($envelope, $data);

        if ($envelope->package) {
            $this->addAuditable($envelope->package->auditable_id);
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
