<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\User;
use App\Cheque;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChequeWasCreated extends AuditEvent implements CanTutorial
{
    use SerializesModels;

    /**
     * Create a new audit event instance.
     *
     * @param User $user
     * @param Cheque $cheque
     * @param array $data
     */
    public function __construct(User $user, Cheque $cheque, $data = [])
    {
        $this->setUpAudit($cheque, $data);
    }

    /**
     * @return int
     */
    public function getEventType()
    {
        return EventType::CHEQUE_CREATED;
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
