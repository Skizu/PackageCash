<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Domain\Tutorial\CanTutorial;
use App\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopePackageWasAssigned extends EnvelopeUpdateEvent implements CanTutorial
{
    use SerializesModels;

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::ENVELOPE_PACKAGE_ASSIGNED;
    }
}
