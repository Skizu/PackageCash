<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of App\Transaction Models with two App\Envelope Models
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

        $this->assertEquals(3, count($transactions));

        foreach($transactions as $transaction) {
            $this->assertInstanceOf('App\Transaction', $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }

    }

    /**
     * Testing the creation of App\Transaction Models with a App\Cheque and App\Envelope Model
     *
     * @return void
     */
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

        $this->assertEquals(3, count($transactions));

        foreach($transactions as $transaction) {
            $this->assertInstanceOf('App\Transaction', $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }

    }

    public function testTransfers()
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

        $transaction = factory(App\Transaction::class)->make();
        $transaction->source()->associate($destination);
        $transaction->destination()->associate($source);
        $user->transactions()->save($transaction);

        $transactions = App\Envelope::find(2)->transactions();

        $this->assertEquals(4, count($transactions));

        foreach($transactions as $transaction) {
            $this->assertInstanceOf('App\Transaction', $transaction);
            $this->assertGreaterThan(0, $transaction->amount);
        }
    }
}
