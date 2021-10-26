<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id','type','status'
    ];
    
    /**
     * この通知を所有するリクエスト。（ Requestモデルとの関係を定義）
     */
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    
    /**
     * この通知の宛先ユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
