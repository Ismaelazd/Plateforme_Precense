<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            
            'role' => 'Admin',
            
        ]);
        DB::table('roles')->insert([
            
            'role' => 'Coach',
            
        ]);
        DB::table('roles')->insert([
            
            'role' => 'Etudiant',
            
        ]);
        DB::table('roles')->insert([
            
            'role' => 'Visiteur',
            
        ]);
    }
}
