<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','icon_id', 'email', 'password','prefecture','age','gender','introduce'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが出した出品。（ Exhibitモデルとの関係を定義）
     */
    public function exhibits()
    {
        return $this->hasMany(Exhibit::class,'exhibitor_id');
    }
    
    /**
     * このユーザが出したリクエスト。（ Requestモデルとの関係を定義）
     */
    public function requests()
    {
        return $this->hasMany(Request::class,'requester_id');
    }
    
    /**
     * このユーザが送ったメッセージ。（ Messageモデルとの関係を定義）
     */
    public function messages()
    {
        return $this->hasMany(Message::class,'sender_id');
    }
    
    /**
     * このユーザが貰ったリクエスト（このユーザーの出品に出されたリクエスト）
     */
    public function receive_requests()
    {
        return $this->hasManyThrough('App\Request', 'App\Exhibit','exhibitor_id');
        
    }
    
    /**
     * このユーザがリクエストを送った出品
     */
    public function requesting_exhibits()
    {
        return $this->hasManyThrough('App\Exhibit', 'App\Request','requester_id');
        
    }
    
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('exhibits','requests');
    }
    
    /**
     * このユーザへの通知。（ Notificationモデルとの関係を定義）
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
