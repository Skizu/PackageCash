<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransferTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of App\Transfer Models with two App\Envelope Models
     *
     * @return void
     */
    public function testEnvelopeToEnvelope()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $destination = factory(App\Envelope::class)->make();
        $user->envelopes()->saveMany([$source, $destination]);

        factory(App\Transfer::class, 3)
            ->make()
            ->each(function ($transfer) use ($user, $source, $destination) {
                $transfer->source()->associate($source);
                $transfer->destination()->associate($destination);
                $user->transfers()->save($transfer);
            });

        $transfers = App\Envelope::find(1)->source;

        $this->assertEquals(3, count($transfers));

        foreach($transfers as $transfer) {
            $this->assertInstanceOf(App\Transfer::class, $transfer);
            $this->assertGreaterThan(0, $transfer->amount);
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

        factory(App\Transfer::class, 3)
            ->make()
            ->each(function ($transfer) use ($user, $source, $destination) {
                $transfer->source()->associate($source);
                $transfer->destination()->associate($destination);
                $user->transfers()->save($transfer);
            });

        $transfers = App\Cheque::find(1)->transfers;

        $this->assertEquals(3, count($transfers));

        foreach($transfers as $transfer) {
            $this->assertInstanceOf(App\Transfer::class, $transfer);
            $this->assertGreaterThan(0, $transfer->amount);
        }

    }

    public function testTransfers()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $destination = factory(App\Envelope::class)->make();
        $user->envelopes()->saveMany([$source, $destination]);

        factory(App\Transfer::class, 3)
            ->make()
            ->each(function ($transfer) use ($user, $source, $destination) {
                $transfer->source()->associate($source);
                $transfer->destination()->associate($destination);
                $user->transfers()->save($transfer);
            });

        $transfer = factory(App\Transfer::class)->make();
        $transfer->source()->associate($destination);
        $transfer->destination()->associate($source);
        $user->transfers()->save($transfer);

        $transfers = App\Envelope::find(2)->transfers();

        $this->assertEquals(4, count($transfers));

        foreach($transfers as $transfer) {
            $this->assertInstanceOf(App\Transfer::class, $transfer);
            $this->assertGreaterThan(0, $transfer->amount);
        }
    }
}