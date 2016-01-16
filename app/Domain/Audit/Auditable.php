<?php

namespace App\Domain\Audit;


use App\AuditLog;
use Auth;

trait Auditable
{
    public function getAuditLog($limit = 50)
    {
        return AuditLog::whereContains('AuditableID', $this->{static::AUDITABLE_COLUMN}, $limit)
            ->orderBy('id', 'desc')->get();
    }
}