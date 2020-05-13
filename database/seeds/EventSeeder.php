<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; 

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'nom'=> 'projets',
            'class'=> 'coding10',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-14 11:00:00.00'),
            'end'=> new Carbon('2020-05-14 23:59:00.00')
        ]);
        DB::table('events')->insert([
            'nom'=> 'labs',
            'class'=> 'coding11',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-14 09:00:00.00'),
            'end'=> new Carbon('2020-05-14 17:00:00.00')
        ]);
        DB::table('events')->insert([
            'nom'=> 'projets',
            'class'=> 'coding10',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-15 11:00:00.00'),
            'end'=> new Carbon('2020-05-15 23:59:00.00')
        ]);    
    }
}
