<?php

use Illuminate\Database\Seeder;

/**
 * Class UserTestSeeder
 *
 * This seeder exist purely for testing the User model.
 * It consists of a single user named "Tony Stark", that has 3 dummy bookings created for him.
 *
 * If you want to test any functionality related to a user, please feel free to use this.
 */
class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $starkId = DB::table('users')->insertGetId([
            'name' => 'Tony Stark',
            'email' => 'tstark@gmail.com',
            'password' => bcrypt('password'),
        ]);


        // Create three dummy bookings for Tony Stark
        DB::table('bookings')->insert([
            'user_id' => $starkId,
            'session_id' => 1,
            'amount' => 1,
            'type' => 'Adult',
        ]);

        DB::table('bookings')->insert([
            'user_id' => $starkId,
            'session_id' => 20,
            'amount' => 2,
            'type' => 'Concession',
        ]);

        DB::table('bookings')->insert([
            'user_id' => $starkId,
            'session_id' => 3,
            'amount' => 1,
            'type' => 'Child',
        ]);

        // Add two dummy wish list items
        DB::table('wishes')->insert([
            'user_id' => $starkId,
            'movie_id' => 3,
        ]);

        DB::table('wishes')->insert([
            'user_id' => $starkId,
            'movie_id' => 8,
        ]);
    }
}
