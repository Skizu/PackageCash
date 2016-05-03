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
        $this->addAuditable($package->getAuditableId());
    }

    /**
     * Event type to be used
     *
     * @return int
     */
    public function getEventType()
    {
        return EventType::ENVELOPE_PACKAGE_UNASSIGNED;
    }
}
