<?php

use Illuminate\Database\Seeder;

class ExhibitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/6npe66wxnk1E9CqfEyPEDG0Ne0eA0uv1cRzkApSU.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '加茂',
            'goods_type' => 'アクリルスタンド',
            'keyword' => 'アクリルプチスライド',
            'notes' => null,
            'status' => 1,
            'want_character' => '真希',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/EYWweTLKJhy04CZCvrgddDYUqi0DX2x51B95KbmH.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '野薔薇',
            'goods_type' => '缶バッジ',
            'keyword' => 'キャラバッジコレクション',
            'notes' => null,
            'status' => 1,
            'want_character' => '真希',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/SLEL4sr1SQxHZb0pzWHqnOpXNOdh34n5HFemnRhd.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '五条',
            'goods_type' => 'キーホルダー',
            'keyword' => 'ぴた！でふぉめ買い物',
            'notes' => '初期傷あり',
            'status' => 1,
            'want_character' => '狗巻',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/DlktZgSjpnYl38gwZapUJbmsb7TtWjHV6RIJWWNx.jpg',
            'thumbnail' => null,
            'origin' => 'ワンピース',
            'character' => 'ルフィ',
            'goods_type' => '缶バッジ',
            'keyword' => '輩缶',
            'notes' => '発送遅くなります',
            'status' => 1,
            'want_character' => 'サンジ',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/BJT8wHaEhtXvFEdzB8bQnqiKacDrC7P6ceQJcLPZ.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '七海',
            'goods_type' => 'ぬい',
            'keyword' => 'ぷちぬいマスコット',
            'notes' => 'ちょっと糸が出てます',
            'status' => 1,
            'want_character' => '真希',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/EpcpjNw98V7XJR6TLFBLeU3zt2QkjdKJcWGqJOXG.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '伏黒',
            'goods_type' => 'キーホルダー',
            'keyword' => 'ぴた！でふぉめ買い物',
            'notes' => null,
            'status' => 1,
            'want_character' => '真希',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 1,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/K4qiXF9vniru7dCaKc7xKsRGiaqXokMmCU1uIp38.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '野薔薇',
            'goods_type' => 'ぬい',
            'keyword' => 'ぷちぬいマスコット',
            'notes' => null,
            'status' => 1,
            'want_character' => '真希',
            'mail_flag' => 1,
            'handing_flag' => 1,
            'place' => '盛岡駅'
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 2,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/7NCjig13m820hZrYszJ5tgXfQXhH0DB74ewZYWeO.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '伏黒',
            'goods_type' => 'キーホルダー',
            'keyword' => 'ぴた！でふぉめ買い物',
            'notes' => null,
            'status' => 1,
            'want_character' => '野薔薇',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 7,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/QTuG4rAtjFTb9yEGebqEhvWINJUZXeGKGboT0BfR.jpg',
            'thumbnail' => null,
            'origin' => 'ワンピース',
            'character' => 'ゾロ',
            'goods_type' => '缶バッジ',
            'keyword' => '輩缶',
            'notes' => null,
            'status' => 1,
            'want_character' => 'ナミ',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
        
        DB::table('exhibits')->insert([
            'exhibitor_id' => 8,
            'pic_id' => 'https://goods-swap-images.s3.ap-northeast-1.amazonaws.com/Tyaqq6WhKgdvbYQogP9UgHd1TUdKVdRzPe2mDMhM.jpg',
            'thumbnail' => null,
            'origin' => '呪術廻戦',
            'character' => '伏黒',
            'goods_type' => 'キーホルダー',
            'keyword' => 'ぴた！でふぉめ買い物',
            'notes' => null,
            'status' => 1,
            'want_character' => '五条',
            'mail_flag' => 1,
            'handing_flag' => 2,
            'place' => null
        ]);
    }
}
