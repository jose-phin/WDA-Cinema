<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Sully',
            'director' => 'Clint Eastwood',
            'main_cast' => 'Tom Hanks,  Aaron Eckhart,  Laura Linney,  Holt McCallany,  Jamey Sheridan,  Jerry Ferrara',
            'genre' => 'Drama',
            'synopsis' => 'On January 15, 2009, the world witnessed the "Miracle on the Hudson" when Captain \'Sully\' Sullenberger (Tom Hanks) glided his disabled plane onto the frigid waters of the Hudson River, saving the lives of all 155 aboard. However, even as Sully was being heralded by the public and the media for his unprecedented feat of aviation skill, an investigation was unfolding that threatened to destroy his reputation and his career.',
            'running_time' => '96 MIN',
            'release_date' => '1472970038',
            'is_now_showing' => true,
        ]);

        DB::table('movies')->insert([
            'title' => 'The Secret Life of Pets',
            'director' => 'Chris Renaud and Yarrow Cheney',
            'main_cast' => 'Louis C.K.,  Eric Stonestreet,  Kevin Hart,  Ellie Kemper',
            'genre' => 'Family',
            'synopsis' => 'Taking place in a Manhattan apartment building, Max\'s life as a favourite pet is turned upside down, when his owner brings home a sloppy mongrel named Duke. They have to put their quarrels behind when they find out that an adorable white bunny named Snowball is building an army of abandoned pets determined to take revenge on all happy-owned pets and their owners.',
            'running_time' => '91 min',
            'release_date' => '1472883638',
            'is_now_showing' => true,
        ]);

        DB::table('movies')->insert([
            'title' => 'Bad Moms',
            'director' => 'Jon Lucas, Scott Moore',
            'main_cast' => 'Mila Kunis,  Kristen Bell,  Kathryn Hahn,  Christina Applegate,  Jada Pinkett Smith,  Emjay Anthony,  Oona Laurence,  Kesha',
            'genre' => 'Comedy',
            'synopsis' => 'A woman with a seemingly perfect life - a great marriage, overachieving kids, beautiful home, stunning looks and still holding down a career. However, she\'s over-worked, over committed and exhausted to the point that she\'s about to snap. ',
            'running_time' => '100 min',
            'release_date' => '1472883638',
            'is_now_showing' => true,
        ]);

        DB::table('movies')->insert([
            'title' => 'Snowden',
            'director' => 'Oliver Stone',
            'main_cast' => 'Joseph Gordon-Levitt, Scott Eastwood,  Shailene Woodley,  Nicolas Cage',
            'genre' => 'Thriller',
            'synopsis' => 'NSA employee Edward Snowden leaks thousands of classified documents to the press.',
            'running_time' => '139 min',
            'release_date' => '1474502400',
            'is_now_showing' => true,
        ]);

        DB::table('movies')->insert([
            'title' => 'Suicide Squad',
            'director' => 'David Ayer',
            'main_cast' => 'Will Smith,  Jared Leto,  Margot Robbie,  Joel Kinnaman and Viola Davis',
            'genre' => 'Action',
            'synopsis' => 'A secret agency led by Amanda Waller recruits imprisoned supervillains to execute dangerous black ops missions in exchange for clemency and saving the world from unknown powerful threat.',
            'running_time' => '123 min',
            'release_date' => '1470268800',
            'is_now_showing' => true,
        ]);

        DB::table('movies')->insert([
            'title' => 'The Magnificent 7',
            'director' => 'Antoine Fuqua',
            'main_cast' => 'Chris Pratt,  Matt Bomer,  Denzel Washington',
            'genre' => 'Action',
            'synopsis' => 'Director Antoine Fuqua brings his modern vision to a classic story in The Magnificent Seven. With the town of Rose Creek under the deadly control of industrialist Bartholomew Bogue, the desperate townspeople employ protection from seven outlaws, bounty hunters, gamblers and hired guns. As they prepare the town for the violent showdown that they know is coming, these seven mercenaries find themselves fighting for more than money. ',
            'running_time' => '133 min',
            'release_date' => '1475130038',
            'is_now_showing' => false,
        ]);

        DB::table('movies')->insert([
            'title' => 'The Girl on the Train',
            'director' => 'Tate Taylor',
            'main_cast' => 'Emily Blunt,  Rebecca Ferguson,  Haley Bennett',
            'genre' => 'Thriller',
            'synopsis' => 'Based on the best-selling novel by Paula Hawkins, The Girl on the Train is an electrifying thriller directed by Tate Taylor (The Help) and starring Emily Blunt. Devastated by her recent divorce, Rachel (Blunt) spends her daily commute fantasising about the seemingly perfect couple who live in a house that her train passes every day, until one morning she sees something shocking happen there and becomes entangled in the mystery that unfolds.',
            'running_time' => '105 min',
            'release_date' => '1475648438',
            'is_now_showing' => false,
        ]);

        DB::table('movies')->insert([
            'title' => 'Doctor Strange',
            'director' => 'Scott Derrickson',
            'main_Cast' => 'Benedict Cumberbatch,  Rachel McAdams,  Chiwetel Ejiofor,  Tilda Swinton',
            'genre' => 'Action',
            'synopsis' => 'Marvel\'s "Doctor Strange" follows the story of the talented neurosurgeon Doctor Stephen Strange who, after a tragic car accident, must put ego aside and learn the secrets of a hidden world of mysticism and alternate dimensions. Based in New York City\'s Greenwich Village, Doctor Strange must act as an intermediary between the real world and what lies beyond, utilising a vast array of metaphysical abilities and artifacts to protect the Marvel cinematic universe. ',
            'running_time' => '130 min',
            'release_date' => '1477526400',
            'is_now_showing' => false,
        ]);

    }
}
