<?php

namespace App\Events;

use App\User;

abstract class Event
{
    protected $_user;

    abstract function getEventType();

    public function setUser(User $user)
    {
        $this->_user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->_user;
    }
}
