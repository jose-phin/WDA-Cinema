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
        // Creates movies and location data, see the respective seeders for more info
        $this->call(MoviesTableSeeder::class);
        $this->call(LocationTableSeeder::class);

        // Create random session times for random movies
        // NOTE: This HAS to be in this position, as it relies on data created in the previous seeders to work
        factory(App\MovieSession::class, 30)->create();
    }
}
