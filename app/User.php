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
     * このユーザが出したリクエスト。（ Propositionモデルとの関係を定義）
     */
    public function propositions()
    {
        return $this->hasMany(Proposition::class,'user_id');
    }
    
    /**
     * このユーザが送ったメッセージ。（ Messageモデルとの関係を定義）
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    /**
     * このユーザが貰ったリクエスト（このユーザーの出品に出されたリクエスト）
     */
    public function receive_propositions()
    {
        return $this->hasManyThrough('App\Proposition', 'App\Exhibit','exhibitor_id');
        
    }
    
    /**
     * このユーザがリクエストを送った出品
     */
    public function proposing_exhibits()
    {
        return $this->hasManyThrough('App\Exhibit', 'App\Proposition','user_id');
        
    }
    
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('exhibits','propositions');
    }
    
    /**
     * このユーザへの通知。（ Notificationモデルとの関係を定義）
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
    /**
     * このユーザのチェックリスト。（ Checklistモデルとの関係を定義）
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
