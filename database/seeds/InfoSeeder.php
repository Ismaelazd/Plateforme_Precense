<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'adresse_un' => '10, place de la Minoterie',
            'adresse_deux' => '1080 Molenbeek-Saint-Jean',
            'tel' => '02 880 99 50',
            'email' => 'info@molengeek.com',
        ]);
    }
}
