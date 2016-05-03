<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\Transfer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TransferWasCreated extends AuditEvent implements CanTutorial
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param Transfer $transfer
     * @param array $data
     */
    public function __construct(Transfer $transfer, $data = [])
    {
        $this->setUpAudit($transfer, $data);
    }

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::TRANSFER_CREATED;
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
