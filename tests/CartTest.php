<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CartTest extends TestCase
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

    public function testUpdateCartItemReflectsQuantityChange()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
             ->put(route('updateCartItem', [
                'id' => 1,
                'booking_id' => 1,
                'adult_qty' => 0,
                'child_qty' => 0,
                'concession_qty' => 1,
             ]));

        $this->seeInDatabase('bookings', ['id' => 1, 'adult_qty' => 0, 'child_qty' => 0, 'concession_qty' => 1]);
    }

    public function testDeleteCartItemWithValidIDNotInDB()
    {
        $user = App\User::find(1);

        $this->actingAs($user)
             ->delete(route('deleteCartItem', ['id' => 1]));

        $this->dontSeeInDatabase('bookings', ['id' => 1]);
    }
}
