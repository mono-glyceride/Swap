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
        $this->loadCount('reviewers');
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

    /**
     * このユーザの新着チェックリストの件数
     */
    public function count_checklists()
    {
        //このユーザーの新着チェックリスト
        $checklists = $this ->checklists()-> where('checklists.status',2)->get();
        //カウント
        $checklists_counter = $checklists ->count();
        return $checklists_counter;
    }

    /**
     * このユーザの新着通知の件数
     */
    public function count_notifications()
    {
        //このユーザーの新着通知
        $notifications = $this ->notifications()-> where('notifications.status',2)->get();
        //カウント
        $notifications_counter = $notifications ->count();
        return $notifications_counter;
    }

    /**
     * このユーザへのレビュー。（ Reviewモデルとの関係を定義）
     */
    public function reviewers()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * このユーザからのレビュー。（ Reviewモデルとの関係を定義）
     */
    public function reviewings()
    {
        return $this->hasMany(Review::class,'reviewer_id');
    }

    /**
     * レビューの平均点を求める
     * @return int
     */
    public function review_avarage()
    {
        //0の除算に注意
        // レビューの件数
        $number = $this->reviewers()->get()->count();
        if($number === null || $number<5){
            return null;
        }

        //1ポイント（良い）評価の件数
        $high = $this ->reviewers()-> where('point',1)->count();

        //良いレビュー（小数点以下四捨五入)
        $average = round($high/$number*10);

        return $average;
    }
    
    /**
     * ユーザーの関わっている取引（終了済みの取引を含まない）
     */
     public function dealings(){
         //受け取ったリクエストの取引
         $exhibit_dealings = $this->receive_propositions()->where('propositions.status',2)->get();
         //dd($exhibit_dealings);
         //リクエストを出した取引
         $proposition_dealings = $this->propositions()->where('propositions.status',2)->get();
         //dd($proposition_dealings);
         $dealings = array($exhibit_dealings, $proposition_dealings);
         return $dealings;
     }
     
     /**
      * LINEを登録しているか。しているならboolのtrue
      */
      public function is_line_user(){
          if(is_null($this->line_id)){
              return false;
          }
          return true;
      }
}
