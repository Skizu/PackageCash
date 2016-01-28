<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopeWasRenamed extends EnvelopeUpdateEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::ENVELOPE_RENAMED;
}
