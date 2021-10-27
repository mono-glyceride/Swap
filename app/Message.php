<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'proposition_id','sender_id','content'
    ];
    
    /**
     * このメッセージを所有するプロポジション。（ Propositionモデルとの関係を定義）
     */
    public function Proposition()
    {
        return $this->belongsTo(Proposition::class);
    }
    
    /**
     * このメッセージを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
