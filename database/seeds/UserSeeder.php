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
            'tel' => '0123456789',
            'rue' => 'rue de la minoterie',
            'ville' => 'Bruxelles',
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Potter',
            'firstname' => 'Harry',
            'email' => 'Harry@Potter.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Albi',
            'firstname' => 'Albi',
            'email' => 'Albi@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/albi.jpeg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Zak',
            'firstname' => 'Zak',
            'email' => 'Zak@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/zak.jpeg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Elias',
            'firstname' => 'Elias',
            'email' => 'Elias@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/elias.jpeg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Maxime',
            'firstname' => 'Maxime',
            'email' => 'Maxime@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/max.jpeg',
            'classe_id' => 1 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Nico',
            'firstname' => 'Nico',
            'email' => 'Nico@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/nico.jpeg',
            'classe_id' => 1 
   
        ]);
    }
}
 