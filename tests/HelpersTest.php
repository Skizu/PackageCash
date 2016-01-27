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
        $user = factory(App\User::class)->create();
        $this->be($user);

        $money = new App\Helpers\Money(123);

        $this->assertEquals('$1.23', $money->formatMoney());
    }
}