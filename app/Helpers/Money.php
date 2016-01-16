<?php

namespace App\Helpers;

use App\Money\MoneyTrait;
use Auth;

class Money
{
    use MoneyTrait {
        formatMoney as traitformatMoney;
    }

    /**
     * @param $money
     * @param null $user
     */
    public function __construct($amount, $user = null)
    {
        $this->user = $user ?: Auth::user();
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function formatMoney()
    {
        return $this->traitformatMoney('amount');
    }

    public static function create($money, $user = null)
    {
        return new self($money, $user);
    }

}