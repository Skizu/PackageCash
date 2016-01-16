<?php

namespace App\Events;

use App\Domain\Audit\EventType;
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
     */
    public function __construct(Cheque $cheque, $data = [])
    {
        $this->setUpAudit($cheque, $data);
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
