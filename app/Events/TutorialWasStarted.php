<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TutorialWasStarted extends AuditEvent implements CanTutorial
{
    use SerializesModels;

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
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::USER_STARTED_TUTORIAL;
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
