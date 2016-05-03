<?php

namespace App\Contracts;


interface Auditable
{
    public function getAuditLog();
    public function getDirty();
    public function getAuditableId();
}