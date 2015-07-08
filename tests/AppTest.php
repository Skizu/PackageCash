<?php

class AppTest extends TestCase
{
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