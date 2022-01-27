<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content' => 'よろしくお願いします。住所は岩手県××です',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content' => 'こちらこそお願いします',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content' => '住所は北海道札幌市●●です',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content' => '1月31日に発送でいかかでしょう。',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content' => 'では同日に発送いたします',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content' => '発送しました。',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content' => 'こちらも発送いたしました。',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content' => 'グッズの到着を確認しました。',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content' => 'よかったです。こちらも無事届きました',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 1,
            'proposition_id' => 3,
            'content' => 'よろしくお願いします',
            'status' =>1,
        ]);
        
        DB::table('messages')->insert([
            'user_id' => 9,
            'proposition_id' => 3,
            'content' => 'こちらこそ、お願いします。',
            'status' =>1,
        ]);
        
    }
}
