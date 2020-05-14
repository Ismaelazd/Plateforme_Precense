<?php

use Illuminate\Database\Seeder;

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
