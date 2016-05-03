<?php

namespace App\Domain\Tutorial;


use App\User;

interface CanTutorial
{
    /**
     * @return User
     */
    public function getUser();
    public function getEventType();
}