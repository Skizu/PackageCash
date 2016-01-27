<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Package;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PackageWasCreated extends AuditEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::PACKAGE_CREATED;

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
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
