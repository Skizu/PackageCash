<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class EnvelopeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
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