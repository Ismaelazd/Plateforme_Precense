<?php

use App\User;
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
            'nom'=> 'Présentation des projets',
            'classe_id'=> '1',
            'description'=> "Ismael & Ben: plateform de présences ; Nazam,Mkdir & Nazam: Platforme de selection <br> Shannon, Zaïnab & Salome: Platforme de recrutement <br>  ",
            'start'=> new Carbon('2020-06-04 14:00:00.00'),
            'end'=> new Carbon('2020-06-04 15:00:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'cours',
            'classe_id'=> '2',
            'description'=> 'laravel: CRUD',
            'start'=> new Carbon('2020-06-04 11:00:00.00'),
            'end'=> new Carbon('2020-06-04 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'cours',
            'classe_id'=> '3',
            'description'=> 'laravel: CRUD',
            'start'=> new Carbon('2020-06-04 11:00:00.00'),
            'end'=> new Carbon('2020-06-04 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'cours',
            'classe_id'=> '4',
            'description'=> 'laravel: CRUD',
            'start'=> new Carbon('2020-06-04 11:00:00.00'),
            'end'=> new Carbon('2020-06-04 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'cours',
            'classe_id'=> '5',
            'description'=> 'laravel: CRUD',
            'start'=> new Carbon('2020-06-04 11:00:00.00'),
            'end'=> new Carbon('2020-06-04 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'cours',
            'classe_id'=> '6',
            'description'=> 'How to douille people?',
            'start'=> new Carbon('2020-06-04 11:00:00.00'),
            'end'=> new Carbon('2020-06-04 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'Projets',
            'classe_id'=> '1',
            'description'=> "Ismael & Ben: plateform de présences ; Nazam,Mkdir & Nazam: Platforme de selection <br> Shannon, Zaïnab & Salome: Platforme de recrutement <br>  ",
            'start'=> new Carbon('2020-06-03 11:00:00.00'),
            'end'=> new Carbon('2020-06-03 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'Projets',
            'classe_id'=> '1',
            'description'=> "Ismael & Ben: plateform de présences ; Nazam,Mkdir & Nazam: Platforme de selection <br> Shannon, Zaïnab & Salome: Platforme de recrutement <br>  ",
            'start'=> new Carbon('2020-06-02 11:00:00.00'),
            'end'=> new Carbon('2020-06-02 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'Projets',
            'classe_id'=> '1',
            'description'=> "Ismael & Ben: plateform de présences ; Nazam,Mkdir & Nazam: Platforme de selection <br> Shannon, Zaïnab & Salome: Platforme de recrutement <br>  ",
            'start'=> new Carbon('2020-05-29 11:00:00.00'),
            'end'=> new Carbon('2020-05-29 23:59:00.00'),
        ]);
        DB::table('events')->insert([
            'nom'=> 'Deployer un site en ligne',
            'classe_id'=> '1',
            'description'=> 'Comment mettre son site en ligne? (version gratuite et payante)',
            'start'=> new Carbon('2020-06-05 11:00:00.00'),
            'end'=> new Carbon('2020-06-05 23:59:00.00'),
        ]);
 
    }
}
