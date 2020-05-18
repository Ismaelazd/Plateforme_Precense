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
            'firstname' => 'Noel',
            'email' => 'Noel@CS10.com',
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
            'classe_id' => 2 
   
        ]);
        DB::table('users')->insert([
            
            'name' => 'Elias',
            'firstname' => 'Elias',
            'email' => 'Elias@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/elias.jpeg',
            'classe_id' => 3 
   
        ]);
        DB::table('users')->insert([
            'name' => 'Maxime',
            'firstname' => 'Maxime',
            'email' => 'Maxime@gmai.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 2,
            'image' => 'team/max.jpeg',
            'classe_id' => 3 
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

        DB::table('users')->insert([
            
            'name' => 'student',
            'firstname' => '12',
            'email' => '12@student.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'Wala',
            'email' => 'Wala@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'Adam',
            'email' => 'Adam@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'Ayhan',
            'email' => 'Ayhan@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'GODIVA',
            'email' => 'GODIVA@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'Ilya',
            'email' => 'Ilya@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'julie',
            'email' => 'julie@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => 'Fati',
            'email' => 'Fati@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => 'Mkdir',
            'email' => 'Mkdir@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => 'Ramzi',
            'email' => 'Ramzi@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => 'Salome',
            'email' => 'Salome@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => 'Shannon',
            'email' => 'Shannon@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => '𝐙𝐚ï𝐧𝐚𝐛',
            'email' => '𝐙𝐚ï𝐧𝐚𝐛@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS10',
            'firstname' => '𝓝𝓪𝔃𝓪𝓶',
            'email' => '𝓝𝓪𝔃𝓪𝓶@CS10.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 1 
        ]);

        DB::table('users')->insert([
            
            'name' => 'CS12',
            'firstname' => 'DrNihilism',
            'email' => 'DrNihilism@CS12.com',
            'password' => Hash::make('azertyuiop'),
            'role_id' => 3,
            'image' => 'team/team-3.jpg',
            'classe_id' => 3 
        ]);
    }
}
 