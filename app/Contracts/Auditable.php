<?php

namespace App\Contracts;


interface Auditable
{
    const AUDITABLE_COLUMN = 'auditable_id';

    public function getAuditLog();
    public function getDirty();
}