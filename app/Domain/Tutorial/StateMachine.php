<?php

namespace App\Domain\Tutorial;


use App\User;
use SM\StateMachine\StateMachine as SM;

class StateMachine extends SM
{
    public function __construct(User $user)
    {
        parent::__construct($user, self::config());
    }

    public function pushSave()
    {
        $this->object->save();
    }

    /**
     * The state machine config.
     *
     * @return array
     */
    private static function config()
    {
        return [
            'graph' => 'tutorial',
            'property_path' => 'tutorial_state',
            'states' => [
                State::UNKNOWN,
                State::CREATE_CHEQUE,
                State::CREATE_ENVELOPE,
                State::DISTRIBUTE_CHEQUE,
                State::CREATE_PACKAGE,
                State::ASSIGN_PACKAGE,
                State::COMPLETE,
            ],
            'transitions' => [
                'Start' => [
                    'from' => [State::UNKNOWN],
                    'to' => State::CREATE_CHEQUE
                ],
                State::CREATE_CHEQUE => [
                    'from' => [State::CREATE_CHEQUE],
                    'to' => State::CREATE_ENVELOPE
                ],
                State::CREATE_ENVELOPE => [
                    'from' => [State::CREATE_ENVELOPE],
                    'to' => State::DISTRIBUTE_CHEQUE
                ],
                State::DISTRIBUTE_CHEQUE => [
                    'from' => [State::DISTRIBUTE_CHEQUE],
                    'to' => State::CREATE_PACKAGE
                ],
                State::CREATE_PACKAGE => [
                    'from' => [State::CREATE_PACKAGE],
                    'to' => State::ASSIGN_PACKAGE
                ],
                State::ASSIGN_PACKAGE => [
                    'from' => [State::ASSIGN_PACKAGE],
                    'to' => State::COMPLETE
                ],
                'Skip' => [
                    'from' => [State::UNKNOWN],
                    'to' => State::COMPLETE
                ]
            ],
            'callbacks' => ['after' => []]
        ];
    }
}