<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChequeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreateCheque()
    {
        $user = factory(App\User::class)->create();

        $cheques = factory(App\Cheque::class, 0)
            ->make()
            ->each(function ($cheque) use ($user) {
                $user->cheques()->save($cheque);
            });

        foreach($cheques as $cheque) {
            $this->assertEquals(500, $cheque->amount);
        }
    }

    public function testCreateChequeTwo()
    {
        $user = factory(App\User::class)->create();

        $chequeOne = factory(App\Cheque::class)->make();
        $chequeTwo = factory(App\Cheque::class)->make();

        $user->cheques()->saveMany([$chequeOne, $chequeTwo]);

        $cheque = App\Cheque::find(1);
        $this->assertEquals(500, $cheque->amount);

        $cheque = App\Cheque::find(2);
        $this->assertEquals(500, $cheque->amount);
    }
}