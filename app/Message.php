<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'request_id','sender_id','content'
    ];
    
    /**
     * このメッセージを所有するリクエスト。（ Requestモデルとの関係を定義）
     */
    public function Request()
    {
        return $this->belongsTo(Request::class);
    }
    
    /**
     * このメッセージを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
