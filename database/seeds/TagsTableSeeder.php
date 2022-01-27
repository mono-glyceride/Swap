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
        DB::table('tags')->insert([
            'keyword' => 'アクリルプチスタンド',
        ]);
        
        DB::table('tags')->insert([
            'keyword' => 'キャラバッジコレクション',
        ]);
        
        DB::table('tags')->insert([
            'keyword' => 'ぴた！でふぉめ買い物',
        ]);
        
        DB::table('tags')->insert([
            'keyword' => '輩缶',
        ]);
        
        DB::table('tags')->insert([
            'keyword' => 'ぷちぬいマスコット',
        ]);
    }
}
