<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'titre' => 'WELCOM TO MGCONNECT',
            'texte' => "La plateforme MGConnect est un endroit où les coach et les students de MolenGeek sont réunis dans des classes virtuelles. Elle a pour but de digitaliser le système de prise de présence, de communication et d'échanges, que ce
            soit pour nos étudiants ou pour notre équipe.",
            'img' => 'about-us.png',
        ]);

    }
}
 