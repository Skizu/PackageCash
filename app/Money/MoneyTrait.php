<?php

namespace App\Money;


trait MoneyTrait
{
    /**
     * @param $value
     * @return string
     */
    public function money($value, $symbol = true)
    {
        return $this->monetary(function() use ($value, $symbol) {
            $format = ($symbol) ? '%.2n' : '%!.2n';
            return money_format($format, $value / 100);
        });
    }


    /**
     * @param $property
     * @return string
     */
    public function formatMoney($property, $symbol = true)
    {
        return $this->money($this->{$property}, $symbol);
    }

    /**
     * @return string
     */
    public function currencySymbol()
    {
        return $this->monetary(function () {
            return localeconv()['currency_symbol'];
        });
    }

    /**
     * @return string
     */
    public function currencyName()
    {
        return $this->monetary(function () {
            return localeconv()['int_curr_symbol'];
        });
    }

    /**
     * @param Callback $cb
     * @return mixed
     */
    private function monetary($cb)
    {
        setlocale(LC_MONETARY, $this->user->locale);
        $return = $cb();
        setlocale(LC_MONETARY, env('LOCALE'));
        return $return;
    }
}