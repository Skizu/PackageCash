<?php

namespace app\Money;


trait MoneyTrait
{

    /**
     * @param $value
     * @return string
     */
    public function money($value)
    {
        setlocale(LC_MONETARY, $this->user->locale);
        $money = money_format('%.2n', $value / 100);
        setlocale(LC_MONETARY, env('LOCALE'));
        return $money;
    }

    public function formatMoney($column) {
        return $this->money($this->$column);
    }
}