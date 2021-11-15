<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'point', 'comment'
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
}
