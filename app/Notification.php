<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id','content_id','status'
    ];
    
    /**
     * この通知を所有するプロポジション。（ Propositionモデルとの関係を定義）
     */
    public function proposition()
    {
        return $this->belongsTo(Proposition::class);
    }
    
    /**
     * この通知を所有するexhibit。（ Propositionモデルとの関係を定義）
     */
    public function exhibit()
    {
        return $this->belongsTo(Exhibit::class);
    }
    
    /**
     * この通知の宛先ユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
