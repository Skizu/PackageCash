<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\Package;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PackageWasCreated extends AuditEvent implements CanTutorial
{
    use SerializesModels;

    /**
     * Create a new audit event instance.
     *
     * @param Package $package
     * @param array $data
     */
    public function __construct(Package $package, $data = [])
    {
        $this->setUpAudit($package, $data);
    }

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::PACKAGE_CREATED;
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
