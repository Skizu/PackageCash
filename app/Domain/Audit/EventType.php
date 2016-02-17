<?php

namespace App\Domain\Audit;

class EventType
{
    /**
     * Event Types
     */
    const USER_CREATED = 101;
    const USER_STARTED_TUTORIAL = 102;
    const USER_COMPLETED_TUTORIAL = 103;

    const CHEQUE_CREATED = 201;

    const ENVELOPE_CREATED = 301;
    const ENVELOPE_RENAMED = 302;
    const ENVELOPE_PACKAGE_ASSIGNED = 303;
    const ENVELOPE_PACKAGE_UNASSIGNED = 304;

    const TRANSFER_CREATED = 401;

    const TRANSACTION_CREATED = 501;

    const PACKAGE_CREATED = 601;
}