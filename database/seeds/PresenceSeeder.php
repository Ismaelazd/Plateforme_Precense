<?php

use App\Event;
use App\User;
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

        $events = Event::all();
        foreach ($events as $event) {
            $users = User::where('classe_id',$event->classe_id)->where('role_id',3)->get();
            foreach ($users as $user) {
                DB::table('presences')->insert([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'etat_id' => 2,
                    'file' => null,
                    'note' => null,
                    'etatfinal_id' => 5,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
      
    }
}
