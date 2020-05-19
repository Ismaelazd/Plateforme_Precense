<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'sous_titre' => 'Plateform connexion',
            'titre_un' => 'Welcome, dear student,',
            'titre_deux' => 'to MGConnect',
            'image' => 'mgwhite_copy.png',
        ]);   
        DB::table('slides')->insert([
            'sous_titre' => 'Plateform connexion',
            'titre_un' => 'Welcome, dear coach,',
            'titre_deux' => 'to MGConnect',
            'image' => 'calender.png',
        ]);   
    }
}
