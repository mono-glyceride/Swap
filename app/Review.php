<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'proposition_id','point', 'comment'
    ];
    
    /**
     * このレビューがレビュー中のユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このレビューを行ったユーザ。（ Userモデルとの関係を定義）
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewer_id');
    }
    
    /**
     * この評価に関連するリクエスト。（ Propositionモデルとの関係を定義）
     */
    public function proposition()
    {
        return $this->belongsTo(Proposition::class);
    }
}
