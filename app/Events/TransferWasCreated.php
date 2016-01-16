<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Transfer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TransferWasCreated extends AuditEvent
{
    use SerializesModels;


    const EVENT_TYPE = EventType::TRANSFER_CREATED;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Transfer $transfer, $data = [])
    {
        $this->setUpAudit($transfer, $data);
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
