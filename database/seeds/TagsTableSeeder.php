<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('tags')->insert([
            'kind_flg' => 0,
            'keyword' => '呪術廻戦',
        ]);
        
        //2
        DB::table('tags')->insert([
            'kind_flg' => 0,
            'keyword' => 'ワンピース',
        ]);
        
        //3
        DB::table('tags')->insert([
            'kind_flg' => 1,
            'keyword' => 'アクリルプチスタンド',
        ]);
        
        //4
        DB::table('tags')->insert([
            'kind_flg' => 1,
            'keyword' => 'キャラバッジコレクション',
        ]);
        
        //5
        DB::table('tags')->insert([
            'kind_flg' => 1,
            'keyword' => 'ぴた！でふぉめ買い物',
        ]);
        
        //6
        DB::table('tags')->insert([
            'kind_flg' => 1,
            'keyword' => '輩缶',
        ]);
        
        //7
        DB::table('tags')->insert([
            'kind_flg' => 1,
            'keyword' => 'ぷちぬいマスコット',
        ]);
        
        //8
        DB::table('tags')->insert([
            'kind_flg' => 2,
            'keyword' => 'アクリルスタンド',
        ]);
        
        //9
        DB::table('tags')->insert([
            'kind_flg' => 2,
            'keyword' => 'キーホルダー',
        ]);
        
        //10
        DB::table('tags')->insert([
            'kind_flg' => 2,
            'keyword' => 'ぬい',
        ]);
        
        //11
        DB::table('tags')->insert([
            'kind_flg' => 2,
            'keyword' => '缶バッジ',
        ]);
        
        //12
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '加茂',
        ]);
        
        //13
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '野薔薇',
        ]);
        
        //14
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '五条',
        ]);
        
        //15
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '七海',
        ]);
        
        //16
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '伏黒',
        ]);
        
        //17
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => '真希',
        ]);
        
        //18
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => 'ゾロ',
        ]);
        
        //19
        DB::table('tags')->insert([
            'kind_flg' => 3,
            'keyword' => 'ルフィ',
        ]);
        
        //20
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => '真希',
        ]);
        
        //21
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => '狗巻',
        ]);
        
        //22
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => 'パンダ',
        ]);
        
        //23
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => '野薔薇',
        ]);
        
        //24
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => '加茂',
        ]);
        
        //25
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => '五条',
        ]);
        
        //26
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => 'ナミ',
        ]);
        
        //27
        DB::table('tags')->insert([
            'kind_flg' => 4,
            'keyword' => 'サンジ',
        ]);
    }
}
