<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class PaymentTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testEnvelope()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $user->envelopes()->save($source);

        factory(App\Payment::class, 3)
            ->make()
            ->each(function ($payment) use ($user, $source) {
                $payment->source()->associate($source);
                $user->payments()->save($payment);
            });

        $payments = App\Envelope::find(1)->payments;

        foreach($payments as $payment) {
            $this->assertInstanceOf('App\Payment', $payment);
            $this->assertGreaterThan(0, $payment->amount);
        }

    }

    public function testCheque()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Cheque::class)->make();
        $user->cheques()->save($source);

        factory(App\Payment::class, 3)
            ->make()
            ->each(function ($payment) use ($user, $source) {
                $payment->source()->associate($source);
                $user->payments()->save($payment);
            });

        $payments = App\Cheque::find(1)->payments;

        foreach($payments as $payment) {
            $this->assertInstanceOf('App\Payment', $payment);
            $this->assertGreaterThan(0, $payment->amount);
        }

    }
}
