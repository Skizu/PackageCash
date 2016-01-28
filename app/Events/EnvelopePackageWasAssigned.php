<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopePackageWasAssigned extends EnvelopeUpdateEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::ENVELOPE_PACKAGE_ASSIGNED;
}
