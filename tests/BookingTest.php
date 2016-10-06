<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingTest extends TestCase
{
    public function setUp() {
        parent::setUp();

        $this->artisan('migrate');
        $this->artisan('db:seed');
    }

    public function tearDown()
    {
        $this->artisan('migrate:reset');
    }

//    public function testAddBookingWithValidSessionIDAddedToDatabase() {
//        $user = App\User::find(1);
//
//        $this->actingAs($user)
//            ->put(route('newBooking', [
//                'session_id' => 1,
//                'amount' => 1,
//                'type' => 'Adult',
//            ]));
//
//        $this->seeInDatabase('bookings', ['id' => 1]);
//    }
//
//    public function testAddBookingWithInvalidSessionIDNotAddedToDatabase() {
//        $user = App\User::find(1);
//
//        $this->actingAs($user)
//            ->put(route('newBooking', [
//                'session_id' => 30,
//                'amount' => 1,
//                'type' => 'Adult',
//            ]));
//
//        $this->dontSeeInDatabase('bookings', ['id' => 2]);
//    }


}