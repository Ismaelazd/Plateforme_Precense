<?php

use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'name'=> 'Coding 10'
        ]);
        DB::table('classes')->insert([
            'name'=> 'Coding 11'
        ]);
        DB::table('classes')->insert([
            'name'=> 'Coding 12'
        ]);
        DB::table('classes')->insert([
            'name'=> 'Coding 13'
        ]);
        DB::table('classes')->insert([
            'name'=> 'Coding 14'
        ]);
        DB::table('classes')->insert([
            'name'=> 'Marketing Lab'
        ]);
    }
}
