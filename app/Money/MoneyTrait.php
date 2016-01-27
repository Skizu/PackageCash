<?php

namespace App\Money;


trait MoneyTrait
{
    protected $_symbol = true;
    protected $_separator = true;

    /**
     * @param $value
     * @return string
     */
    public function money($value, $symbol = null, $separator = null)
    {
        return $this->monetary(function() use ($value, $symbol, $separator) {
            $format = '%^!.2n';
            if(($symbol?:$this->_symbol) == true) {
                $format = str_replace('!', '', $format);
            }
            if(($separator?:$this->_separator) == true) {
                $format = str_replace('^', '', $format);
            }
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
     * @return $this
     */
    public function disableSeparator()
    {
        $this->_separator = false;
        return $this;
    }
    /**
     * @return $this
     */
    public function enableSeparator()
    {
        $this->_separator = true;
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