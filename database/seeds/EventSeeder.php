<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-16 11:00:00.00'),
            'end'=> new Carbon('2020-05-16 23:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-17 11:00:00.00'),
            'end'=> new Carbon('2020-05-17 23:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-18 11:00:00.00'),
            'end'=> new Carbon('2020-05-18 12:00:00.00')
        ]);   
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-19 11:00:00.00'),
            'end'=> new Carbon('2020-05-19 12:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-20 11:00:00.00'),
            'end'=> new Carbon('2020-05-20 12:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-21 11:00:00.00'),
            'end'=> new Carbon('2020-05-21 12:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-22 11:00:00.00'),
            'end'=> new Carbon('2020-05-22 12:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-25 11:00:00.00'),
            'end'=> new Carbon('2020-05-25 12:59:00.00')
        ]);    
        DB::table('events')->insert([
            'nom'=> 'projets platform',
            'classe_id'=> '1',
            'description'=> 'Creation de plateform de présence',
            'start'=> new Carbon('2020-05-26 11:00:00.00'),
            'end'=> new Carbon('2020-05-26 12:59:00.00')
        ]);    
    }
}
