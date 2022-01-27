<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 2,
            'reviewer_id' => 1,
            'proposition_id'=>1,
            'point'=>1,
            'comment'=>'お取引ありがとうございました。',
        ]);
        
        DB::table('reviews')->insert([
            'user_id' => 1,
            'reviewer_id' => 2,
            'proposition_id'=>1,
            'point'=>1,
            'comment'=>'お取引ありがとうございました。',
        ]);
    }
}
