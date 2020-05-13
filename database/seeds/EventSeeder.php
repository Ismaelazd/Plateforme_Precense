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
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-14 11:00:00.00'),
            'end'=> new Carbon('2020-05-14 23:59:00.00')
        ]);
        DB::table('events')->insert([
            'nom'=> 'labs',
            'classe_id'=> '2',
            'description'=> 'Projets L.A.B.S.',
            'start'=> new Carbon('2020-05-14 09:00:00.00'),
            'end'=> new Carbon('2020-05-14 17:00:00.00')
        ]);
        DB::table('events')->insert([
            'nom'=> 'projets',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-15 11:00:00.00'),
            'end'=> new Carbon('2020-05-15 23:59:00.00')
        ]);    
    }
}
