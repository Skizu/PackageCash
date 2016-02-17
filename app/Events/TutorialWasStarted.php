<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TutorialWasStarted extends AuditEvent
{
    use SerializesModels;


    const EVENT_TYPE = EventType::USER_STARTED_TUTORIAL;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param array $data
     */
    public function __construct(User $user, $data = [])
    {
        $this->setUpAudit($user, $data);
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
