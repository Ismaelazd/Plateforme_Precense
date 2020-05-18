<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            'user_id' => '2',
            'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, atque? Dicta magni excepturi explicabo error fugiat sequi temporibus obcaecati vero cum esse! Numquam ullam possimus laborum aut odio quidem nulla!',
        ]);
        DB::table('testimonials')->insert([
            'user_id' => '3',
            'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, atque? Dicta magni excepturi explicabo error fugiat sequi temporibus obcaecati vero cum esse! Numquam ullam possimus laborum aut odio quidem nulla!',
        ]);
        DB::table('testimonials')->insert([
            'user_id' => '9',
            'message' => 'Etudiant message testimonial',
        ]);
        DB::table('testimonials')->insert([
            'user_id' => '10',
            'message' => 'Etudiant message testimonial',
        ]);
        DB::table('testimonials')->insert([
            'user_id' => '11',
            'message' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, atque? Dicta magni excepturi explicabo error fugiat sequi temporibus obcaecati vero cum esse! Numquam ullam possimus laborum aut odio quidem nulla!',
        ]);
    }
}
