<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopeWasRenamed extends EnvelopeUpdateEvent
{
    use SerializesModels;

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::ENVELOPE_RENAMED;
    }
}
