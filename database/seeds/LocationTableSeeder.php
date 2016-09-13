<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Broadmeadows',
        ]);

        DB::table('locations')->insert([
            'name' => 'Eastland',
        ]);

        DB::table('locations')->insert([
            'name' => 'Forest Hill',
        ]);

        DB::table('locations')->insert([
            'name' => 'Greensborough',
        ]);

        DB::table('locations')->insert([
            'name' => 'Highpoint',
        ]);

        DB::table('locations')->insert([
            'name' => 'Melbourne Central',
        ]);

        DB::table('locations')->insert([
            'name' => 'Northland',
        ]);

        DB::table('locations')->insert([
            'name' => 'Victoria Garderns',
        ]);

        DB::table('locations')->insert([
            'name' => 'Watergardens',
        ]);
    }
}
