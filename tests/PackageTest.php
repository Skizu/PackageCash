<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class PackageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Testing the creation of an App\Package Model
     *
     * @return void
     */
    public function testCreatePackage()
    {
        $user = factory(App\User::class)->create();
        $source = factory(App\Envelope::class)->make();
        $destination = factory(App\Envelope::class)->make();
        $user->envelopes()->saveMany([$source, $destination]);


    }
}