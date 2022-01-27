<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    protected $fillable = [
        'exhibit_id','pic_id','user_id',
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
     * このリクエストが所有するチェックリスト。（ Checklistモデルとの関係を定義）
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
    
    /**
     * 与えられたuser_idの取引相手を返す
     * * @param  int  $user_id
     * @return user model
     */
    public function partner($user_id)
    {
        // 出品者
        $exhibitor_id = $this->exhibit->exhibitor_id;
        //認証ユーザーが出品者なら
        if($exhibitor_id === $user_id){
            $partner = \App\User::find($this->user_id);
        }
        else{
            $partner = \App\User::find($exhibitor_id);
        }
        return $partner;
    }
    
    /**
     * このリクエストに関連する評価。（ Reviewモデルとの関係を定義）
     */
    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    /**
     * 指定されたuser_idがこのリクエストにおいて評価されているか調べる。既に評価されているならtrueを返す
     * * @param  int  $user_id
     * @return bool
     */
    public function is_reviewed($user_id)
    {
        // 関連する評価の中に $user_idのものが存在するか
        return $this->reviews()->where('user_id', $user_id)->exists();
    }
    
    /**
     * 紐づいたメッセージのうち、最新のものを取り出す。ない場合はnullを返す
     * @param　int $user_id
     * @return int message_id null
     */
     public function latest_message()
     {
         $messages = $this->messages()->first();
         if(is_null($messages)){
            return null;
         }
         else{
            return $this->messages()->orderBy('created_at','desc')->first();
         }
     }
}
