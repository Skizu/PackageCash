<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class EnvelopeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of an App\Cheque Model
     *
     * @return void
     */
    public function testCreateEnvelope()
    {
        $user = factory(App\User::class)->create();

        $envelopes = factory(App\Envelope::class, 0)
            ->make()
            ->each(function ($envelope) use ($user) {
                $user->envelopes()->save($envelope);
            });

        foreach($envelopes as $envelope) {
            $this->assertEquals(0, $envelope->amount);
        }
    }

    /**
     * Testing the creation of 2 App\Envelope Models and are fetching them
     *
     * @return void
     */
    public function testCreateEnvelopeTwo()
    {
        $user = factory(App\User::class)->create();

        $envelopeOne = factory(App\Envelope::class)->make();
        $envelopeTwo = factory(App\Envelope::class)->make();

        $user->envelopes()->saveMany([$envelopeOne, $envelopeTwo]);

        $envelope = App\Envelope::find(1);
        $this->assertEquals(0, $envelope->amount);

        $envelope = App\Envelope::find(2);
        $this->assertEquals(0, $envelope->amount);
    }
}