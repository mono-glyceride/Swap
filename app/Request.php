<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'exhibit_id','pic_id',
        'mail_flag','ship_from','days','handing_flag','place','condition','notes','status'
    ];
    
    /**
     * このリクエストを所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このリクエストのあて先の出品。（ Exhibitモデルとの関係を定義）
     */
    public function exhibit()
    {
        return $this->belongsTo(Exhibit::class);
    }
    
    /**
     * このリクエストでのメッセージ。（ Messageモデルとの関係を定義）
     */
    public function Messages()
    {
        return $this->hasMany(Message::class);
    }
    
    /**
     * このリクエストが所有する通知。（ Notificationモデルとの関係を定義）
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
