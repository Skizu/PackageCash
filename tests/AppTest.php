<?php

class AppTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testAppStarts()
    {
        $this->visit('/')
             ->see('PostalCache');
    }
}
