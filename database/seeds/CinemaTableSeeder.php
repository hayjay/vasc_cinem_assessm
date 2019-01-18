<?php

use Illuminate\Database\Seeder;

class CinemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinemas')->insert([
        	'title' => 'cinema 1',
        	'address' => '12 address street, city, state',
        ]);

        DB::table('cinemas')->insert([
        	'title' => 'cinema 2',
        	'address' => '12 address street, city, state',
        ]);

        DB::table('cinemas')->insert([
        	'title' => 'cinema 3',
        	'address' => '12 address street, city, state',
        ]);
    }
}
