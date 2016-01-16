<?php

namespace App\Money;


trait MoneyTrait
{
    protected $_symbol = true;

    /**
     * @param $value
     * @return string
     */
    public function money($value, $symbol = null)
    {
        return $this->monetary(function() use ($value, $symbol) {
            $format = ($symbol?:$this->_symbol) ? '%.2n' : '%!.2n';
            return money_format($format, $value / 100);
        });
    }


    /**
     * @return string
     */
    public function formatMoney()
    {
        $p = $this;

        foreach(func_get_args() as $property) {
            $p = $p->{$property};
        }

        return $this->money($p, $this->_symbol);
    }

    /**
     * @return string
     */
    public function enableSymbol()
    {
        $this->_symbol = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function disableSymbol()
    {
        $this->_symbol = false;
        return $this;
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