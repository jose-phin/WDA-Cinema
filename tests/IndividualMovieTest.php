<?php

class IndividualMovieTest extends TestCase
{
    public function setUp() {
        parent::setUp();

        $this->artisan('migrate');
        $this->seed('TestingSeeder');
    }

    public function tearDown()
    {
        $this->artisan('migrate:reset');
    }

    public function testMovieWithValidIdReturns200() {
        $this->get(route('movieById', [1]))
             ->assertResponseStatus(200);
    }

    public function testMovieWithInvalidIdReturns404() {
        $this->get(route('movieById', [100000000]))
             ->assertResponseStatus(404);
    }
}
