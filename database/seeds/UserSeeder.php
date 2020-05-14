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
            'image' => 'team/team-2.jpg',
            'classe_id' => null 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Noel',
            'firstname' => 'Nazam',
            'email' => 'ben@bonjour.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-2.jpg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Potter',
            'firstname' => 'Harry',
            'email' => 'Harry@Potter.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-2.jpg',
            'classe_id' => 1 
   
        ]);
    }
}
