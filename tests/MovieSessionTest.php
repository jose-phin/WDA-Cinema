<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MovieSessionTest extends TestCase
{
    public function testGetSessionWithValidCinemaIDReturns200()
    {
        $this->get(route('sessionsByCinema', [1]))
             ->assertResponseStatus(200);
    }

    public function testGetSessionWithInvalidCinemaIDReturns404()
    {
        $this->get(route('sessionsByCinema', [10000000]))
             ->assertResponseStatus(404);
    }

    public function testGetSessionWithValidMovieIDReturns200()
    {
        $this->get(route('sessionsByMovie', [1]))
             ->assertResponseStatus(200);
    }

    public function testGetSessionWithInvalidMovieIDReturns404()
    {
        $this->get(route('sessionsByMovie', [10000000]))
            ->assertResponseStatus(404);
    }
}
