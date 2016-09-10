<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some random users for testing
        factory(App\User::class, 20)->create();

        // Creates dummy movie and location data, see the respective seeders for more info
        $this->call(MoviesTableSeeder::class);
        $this->call(LocationTableSeeder::class);

        // Create random session times for random movies
        // NOTE: This HAS to be in this position, as it relies on data created in the previous seeders to work
        factory(App\MovieSession::class, 20)->create();
    }
}
