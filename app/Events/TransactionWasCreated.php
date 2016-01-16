<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Transaction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TransactionWasCreated extends AuditEvent
{
    use SerializesModels;


    const EVENT_TYPE = EventType::TRANSACTION_CREATED;

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
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
