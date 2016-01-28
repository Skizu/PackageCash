<?php

namespace App\Events;

use App\Domain\Audit\EventType;
use App\Envelope;
use App\Package;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnvelopePackageWasUnassigned extends EnvelopeUpdateEvent
{
    use SerializesModels;

    const EVENT_TYPE = EventType::ENVELOPE_PACKAGE_UNASSIGNED;

    /**
     * Create a new audit event instance.
     *
     * @param Envelope $envelope
     * @param array $data
     */
    public function __construct(Envelope $envelope, $data = [])
    {
        parent::__construct($envelope, $data);

        $package = Package::find($envelope->getOriginal('package_id'));

        $this->addData('OriginalPackage', $package);
        $this->addAuditable($package->auditable_id);
    }
}
