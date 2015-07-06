<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testEnvelopeToEnvelope()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $destination = factory(App\Envelope::class)->make();
        $user->envelopes()->saveMany([$source, $destination]);

        factory(App\Transaction::class, 3)
            ->make()
            ->each(function ($transaction) use ($user, $source, $destination) {
                $transaction->source()->associate($source);
                $transaction->destination()->associate($destination);
                $user->transactions()->save($transaction);
            });

        $transactions = App\Envelope::find(1)->source;

        foreach($transactions as $transaction) {
            $this->assertInstanceOf('App\Transaction', $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }

    }

    public function testChequeToEnvelope()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Cheque::class)->make();
        $destination = factory(App\Envelope::class)->make();
        $user->envelopes()->saveMany([$source, $destination]);

        factory(App\Transaction::class, 3)
            ->make()
            ->each(function ($transaction) use ($user, $source, $destination) {
                $transaction->source()->associate($source);
                $transaction->destination()->associate($destination);
                $user->transactions()->save($transaction);
            });

        $transactions = App\Cheque::find(1)->transactions;

        foreach($transactions as $transaction) {
            $this->assertInstanceOf('App\Transaction', $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }

    }
}
