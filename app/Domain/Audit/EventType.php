<?php

namespace App\Domain\Audit;

class EventType
{
    /**
     * Event Types
     */
    const USER_CREATED = 101;

    const CHEQUE_CREATED = 201;

    const ENVELOPE_CREATED = 301;
    const ENVELOPE_RENAMED = 302;

    const TRANSFER_CREATED = 401;

    const TRANSACTION_CREATED = 501;
}