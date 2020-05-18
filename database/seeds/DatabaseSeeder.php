<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClasseSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EtatSeeder::class);
        $this->call(EtatfinalSeeder::class);
        $this->call(PresenceSeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(TestimonialSeeder::class);
    }
}
