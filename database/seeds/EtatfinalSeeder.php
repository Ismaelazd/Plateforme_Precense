<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatfinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Présence'
        ]);
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Présence avec retard'
        ]);
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Absences'
        ]);
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Absences avec justificatif'
        ]);
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Absences injustifiées'
        ]);
        DB::table('etatfinals')->insert([
            'etatfinal'=> 'Absences annoncées'
        ]);
    }
}
