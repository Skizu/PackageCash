<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Transaction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TransactionWasCreated extends AuditEvent
{
    use SerializesModels;

    /**
     * Create a new audit event instance.
     *
     * @param Transaction $transaction
     * @param array $data
     */
    public function __construct(Transaction $transaction, $data = [])
    {
        $this->setUpAudit($transaction, $data);
    }

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::TRANSACTION_CREATED;
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
