<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presences')->insert([
            
            'user_id' => 2,
            'event_id' => 1,
            'etat_id' => 1,
            'file' => null,
            'note' => null,
            'etatfinal_id' => 1,
            'created_at' => new Carbon('2020-05-13 11:00:00.00'),

   
        ]);
        DB::table('presences')->insert([
            
            'user_id' => 2,
            'event_id' => 2,
            'etat_id' => 1,
            'file' => null,
            'note' => null,
            'etatfinal_id' => 1,
            'created_at' => new Carbon('2020-05-13 11:00:00.00'),

   
        ]);
        DB::table('presences')->insert([
            
            'user_id' => 3,
            'event_id' => 1,
            'etat_id' => 3,
            'file' => null,
            'note' => 'bus en retard',
            'etatfinal_id' => 2,
            'created_at' => new Carbon('2020-05-15 10:50:00.00'),
        ]);
        DB::table('presences')->insert([
            
            'user_id' => 3,
            'event_id' => 2,
            'etat_id' => 2,
            'file' => null,
            'note' => null,
            'etatfinal_id' => 6,
            'created_at' => new Carbon('2020-05-13 11:00:00.00'),
   
        ]);
    }
}
