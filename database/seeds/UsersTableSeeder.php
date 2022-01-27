<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'モモタ',
            'email' => 'test1@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '3',
            'age' => '1',
            'gender' => '1',
            'introduce' => 'よろしくお願いします。ジャンルはワンピ、推しはルフィさんです。基本的に無限回収を行っております。お互いに気持ちのいいお取引にしましょう。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'yakinikuzuki',
            'email' => 'test2@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '0',//0-48
            'age' => '2',//1-3
            'gender' => '3',//1-3
            'introduce' => '呪術の野薔薇ちゃん中心にグッズを回収しています。ぬいが特に大好きです。よろしくお願いします。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'ぼっと',
            'email' => 'test3@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '34',//0-48
            'age' => '2',//1-3
            'gender' => '2',//1-3
            'introduce' => '映画で呪に落ちました。特級箱推しです。取引経験は少ないですが、丁寧な取引を心がけています。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'えね',
            'email' => 'test4@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '45',//0-48
            'age' => '3',//1-3
            'gender' => '1',//1-3
            'introduce' => '推しはヒロアカのオリジン組です。仕事の都合上、発送は遅くなる傾向にあります。よろしくお願いします。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'nero',
            'email' => 'test5@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '2',//0-48
            'age' => '1',//1-3
            'gender' => '3',//1-3
            'introduce' => '呪の植物トリオが推しです。3人１セットでグッズを回収しているため、推しを出品することがございます。'
        ]);
        
        DB::table('users')->insert([
            'name' => '莉緒',
            'email' => 'test6@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '12',//0-48
            'age' => '2',//1-3
            'gender' => '2',//1-3
            'introduce' => '呪術の本誌グッズを回収しています。さしす箱推し。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'のぞむ',
            'email' => 'test7@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '21',//0-48
            'age' => '3',//1-3
            'gender' => '4',//1-3
            'introduce' => 'ワンピの番くじを中心に交換を行っています。推しはナミさんです。'
        ]);
        
        DB::table('users')->insert([
            'name' => 'しき',
            'email' => 'test8@test',
            'password' => bcrypt('testtest'),
            'prefecture' => '34',//0-48
            'age' => '2',//1-3
            'gender' => '1',//1-3
            'introduce' => '推しはcv中村さんのキャラ全般です。ジャンルに偏りはそんなにないです。よろしくお願いします。'
        ]);
    }
}
