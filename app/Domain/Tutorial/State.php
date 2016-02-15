<?php

namespace App\Domain\Tutorial;


class State
{
    const UNKNOWN = null;
    const CREATE_CHEQUE = 100;
    const CREATE_ENVELOPE = 200;
    const DISTRIBUTE_CHEQUE = 300;
    const CREATE_PACKAGE = 400;
    const ASSIGN_PACKAGE = 500;
    const COMPLETE = 600;
}