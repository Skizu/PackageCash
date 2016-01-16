<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of App\Transactions Models with App\Envelope Model
     *
     * @return void
     */
    public function testEnvelope()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $user->envelopes()->save($source);

        factory(App\Transaction::class, 3)
            ->make()
            ->each(function ($transaction) use ($user, $source) {
                $transaction->envelope()->associate($source);
                $user->transactions()->save($transaction);
            });

        $transactions = App\Envelope::find(1)->transactions;

        $this->assertEquals(3, count($transactions));

        foreach($transactions as $transaction) {
            $this->assertInstanceOf(App\Transaction::class, $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }

    }
}