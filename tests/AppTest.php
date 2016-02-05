<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AppTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test.
     *
     * @return void
     */
    public function testAppStarts()
    {
        $this->visit('/')
            ->see('PostalCache');
    }
}