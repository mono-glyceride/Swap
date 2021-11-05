<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibit extends Model
{
    protected $fillable = [
        'pic_id','origin', 'character', 'goods_type','key_wprd','condition','notes',
        'want_pic_id','want_origin','want_character','want_goods_type','want_key_word','want_notes',
        'mail_flag','ship_from','days','handing_flag','place'
    ];
    
    /**
     * この出品を行ったユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この出品が所有するプロポジション。（ Propositionモデルとの関係を定義）
     */
    public function propositions()
    {
        return $this->hasMany(Proposition::class);
    }
    
    /**
     * この出品が所有する通知。（ Notificationモデルとの関係を定義）
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
    /**
     * この出品が所有するチェックリスト。（ Notificationモデルとの関係を定義）
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
    
}
