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

        $envelopes = factory(App\Envelope::class, 3)
            ->make()
            ->each(function ($envelope) use ($user) {
                $user->envelopes()->save($envelope);
            });

        foreach($envelopes as $envelope) {
            $this->assertEquals(0, $envelope->amount);
        }
    }
}