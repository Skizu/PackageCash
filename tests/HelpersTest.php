<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class HelpersTest extends TestCase
{
    use DatabaseMigrations;

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

        $this->assertEquals('£1.23', $money->formatMoney());
    }

    /**
     * Money Helper object handling test
     *
     * @return void
     */
    public function testMoneyUSD()
    {
        $user = factory(App\User::class)->create(['locale' => 'en_US.utf-8']);
        $this->be($user);

        $money = new App\Helpers\Money(123);

        $this->assertEquals('$1.23', $money->formatMoney());
    }


}