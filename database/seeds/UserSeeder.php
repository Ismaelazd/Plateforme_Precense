<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name' => 'Isma',
            'firstname' => 'Ben',
            'email' => 'leamssi39@gmail.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 1,
            'image' => 'team-2.jpg'
   
        ]);
    }
}
