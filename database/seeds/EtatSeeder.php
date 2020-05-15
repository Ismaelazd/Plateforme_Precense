<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etats')->insert([
            'etat'=> 'Present'
        ]);
        DB::table('etats')->insert([
            'etat'=> 'Absent'
        ]);
        DB::table('etats')->insert([
            'etat'=> 'Retard'
        ]);
    }
}
