<?php

namespace App\Domain\Audit;


use App\AuditLog;

class ViewParser
{
    protected static $views = [
        EventType::USER_CREATED => 'audit.user-created',
        EventType::USER_STARTED_TUTORIAL => 'audit.user-tutorial-started',
        EventType::USER_COMPLETED_TUTORIAL => 'audit.user-tutorial-completed',
        EventType::CHEQUE_CREATED => 'audit.cheque-created',
        EventType::ENVELOPE_CREATED => 'audit.envelope-created',
        EventType::ENVELOPE_RENAMED => 'audit.envelope-renamed',
        EventType::ENVELOPE_PACKAGE_ASSIGNED => 'audit.envelope-package-assigned',
        EventType::ENVELOPE_PACKAGE_UNASSIGNED => 'audit.envelope-package-unassigned',
        EventType::TRANSFER_CREATED => 'audit.transfer-created',
        EventType::TRANSACTION_CREATED => 'audit.transaction-created',
        EventType::PACKAGE_CREATED => 'audit.package-created',
    ];

    protected $auditLog;

    public function __construct(AuditLog $auditLog) {
        $this->auditLog = $auditLog;
    }

    public function parse() {
        return view(static::$views[$this->auditLog->data->EventType], (array) $this->auditLog->data);
    }

    public function parseData(AuditLog $auditLog) {
        return view('audit.attributes', (array) $auditLog->data);
    }
}