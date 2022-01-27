<?php

use Illuminate\Database\Seeder;

class PropositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propositions')->insert([
            'user_id' => 2,
            'exhibit_id' => 8,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/b8Zm5FtllT4iykjnQJ7AyWsj3qaIGPbNQjDd5rGd.jpg',
            'thumbnail' => null,
            'mail_flag' => 1,
            'ship_from' => 1,
            'days'=>3,
            'handing_flag' => 2,
            'place' => null,
            'condition'=> 1,
            'notes' => null,
            'status' =>2,
            'deadline' =>null
        ]);
        
        DB::table('propositions')->insert([
            'user_id' => 3,
            'exhibit_id' => 4,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/oOZRZLiR6JL90oFN91wHrHXk4AQjuaW6gckEFrOX.jpg',
            'thumbnail' => null,
            'mail_flag' => 1,
            'ship_from' => 34,
            'days'=>2,
            'handing_flag' => 2,
            'place' => null,
            'condition'=>1,
            'notes' =>null,
            'status' =>1,
            'deadline' =>null
        ]);
        
        DB::table('propositions')->insert([
            'user_id' => 9,
            'exhibit_id' => 5,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/Jnc3DRf9LuCgXcnrbV5Dm4hrCKsCIIMj3oxivs3v.jpg',
            'thumbnail' => null,
            'mail_flag' => 1,
            'ship_from' => 31,
            'days'=>1,
            'handing_flag' => 2,
            'place' => null,
            'condition'=>1,
            'notes' =>null,
            'status' =>2,
            'deadline' =>null
        ]);
    }
}
