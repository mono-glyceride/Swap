<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function store($user_enter_words, $exhibit)
    {
        $kind_flg = 0;
        foreach($user_enter_words as $user_enter_word){
            if(!is_null($user_enter_word)){
                //空白区切りで単語を要素数10の配列$wordsに取り出す（全角と半角の場合あり）
                $words = preg_split('/[\p{Z}\p{Cc}]++/u', $user_enter_word, 10, PREG_SPLIT_NO_EMPTY);
        
                //配列すべてでループ
                foreach($words as $word){
        
                //既存のタグか
                $tag = DB::table('tags')->where('keyword', $word)->where('kind_flg',$kind_flg)->first();
        
                    //タグにないなら$wordをタグテーブルのレコードに追加
                    if (is_null($tag)) {
                    $tag = \App\Tag::create([
                        'keyword' => $word,
                        'kind_flg' =>$kind_flg
                        ]);
                    }
        
                //タグと出品を紐づけ
                $exhibit->add_tagging($tag->id);
                }
            }
        
        $kind_flg += 1;
        }
    }
}
