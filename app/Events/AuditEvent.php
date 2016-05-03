<?php

namespace App\Events;

use App\User;
use App\Contracts\Auditable;
use Auth;


abstract class AuditEvent extends Event
{
    protected $_data = [];
    protected $_user;
    protected $_object;
    protected $_auditable = [];

    /**
     * Set up the audit data
     *
     * @param Auditable $object
     * @param array $data
     * @param User $user
     */
    public function setUpAudit(Auditable $object, $data = [], User $user = null)
    {
        $this->setUser($user ?: Auth::user());
        $this->setObject($object);
        $this->addAuditable($this->getUser()->getAuditableId(), $object->getAuditableId());
        $this->_data = $data;
    }

    /**
     * Set audit object
     *
     * @param Auditable $object
     */
    private function setObject(Auditable $object)
    {
        $this->_object = $object;
    }

    /**
     * Add auditable to audit context
     *
     * @param mixed $_ [optional]
     */
    public function addAuditable($_ = null)
    {
        $this->_auditable = array_filter(array_flatten(array_merge($this->_auditable, func_get_args())));
    }

    /**
     * Add audit data
     *
     * @param $key
     * @param $value
     */
    public function addData($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * Return audit data
     *
     * @return array
     */
    public function getMessage()
    {
        return [
            'AuditableID' => $this->_auditable,
            'EventType' => $this->getEventType(),
            'ObjectID' => $this->_object->id,
            'UserID' => $this->_user->id,
            'Data' => $this->_data,
            'Dirty' => $this->getDirty()
        ];
    }

    /**
     * Return dirty data on auditable object
     *
     * @return mixed
     */
    public function getDirty()
    {
        return $this->_object->getDirty();
    }

}