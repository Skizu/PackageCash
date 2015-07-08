<?php

class HelpersTest extends TestCase
{
    /**
     * Money Helper object handling test
     *
     * @return void
     */
    public function testMoney()
    {
        $money = new App\Helpers\Money(123);
        $this->assertEquals('1.23', $money->inPoundsAndPence());
    }
}