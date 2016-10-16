<?php

use Illuminate\Database\Seeder;

/**
 * Class TestingSeeder
 *
 * Seeder used by unit tests. Essentially, it is the same as the DatabaseSeeder except that it creates a
 * dummy user for us to use in our tests.
 */
class TestingSeeder extends Seeder
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

        // Run our test seeder to create a dummy user and dummy booking
        $this->call(UserTestSeeder::class);
    }
}
