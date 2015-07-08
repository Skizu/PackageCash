<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChequeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of an App\Cheque Model
     *
     * @return void
     */
    public function testCreateCheque()
    {
        $user = factory(App\User::class)->create();

        $cheques = factory(App\Cheque::class, 3)
            ->make()
            ->each(function ($cheque) use ($user) {
                $user->cheques()->save($cheque);
            });

        foreach ($cheques as $cheque) {
            $this->assertEquals(500, $cheque->amount);
        }
    }

    /**
     * Testing the creation of 2 App\Cheque Models and are fetching them
     *
     * @return void
     */
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