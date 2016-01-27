<?php

namespace App\Helpers;


use Carbon\Carbon;

class AuditLogDateHandler
{
    protected $date = null;

    public function generate($date)
    {
        return $this->check($date) ? $this->compare($date) : null;
    }

    private function check($date)
    {
        $date = $date->toDateString();
        if ($this->date == null) {
            $check = true;
        } else {
            $check = $this->date != $date;
        }

        $this->date = $date;
        return $check;
    }

    private function compare($date)
    {
        if ($this->date == (new Carbon('now'))->toDateString()) {
            return 'Today';
        } elseif ($this->date == (new Carbon('yesterday'))->toDateString()) {
            return 'Yesterday';
        } else {
            return $date->format('m/d/Y');
        }
    }
}