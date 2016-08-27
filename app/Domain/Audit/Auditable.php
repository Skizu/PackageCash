<?php

namespace App\Domain\Audit;


use App\AuditLog;

trait Auditable
{
    public static function auditableColumn()
    {
        return 'auditable_id';
    }

    public function getAuditableId()
    {
        return $this->{static::auditableColumn()};
    }

    public function getAuditLog($limit = 50)
    {
        return AuditLog::whereContains('AuditableID', $this->getAuditableId())->take($limit)
            ->orderBy('id', 'desc')->get();
    }
}