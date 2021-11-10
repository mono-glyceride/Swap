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
     * この出品のリクエストが持つチェックリスト（この出品のリクエストのチェックリスト）
     */
    public function checklists()
    {
        return $this->hasManyThrough('App\Checklist', 'App\Proposition');
        
    }
    
    /**
     * この出品についたタグ。（ Tagモデルとの関係を定義）
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'exhibit_tagging')->withTimestamps();
    }
    
    /**
     *$tag_idで渡されたタグを出品に追加
     */
    public function add_tagging($tag_id)
    {
        if(!$this->is_tagging($tag_id)){
        //同じタグがこの出品についてないなら中間テーブルにレコード追加
        $this->tags()->attach($tag_id);
        }
    }
    
    /**
     * 指定されたタグIDがこの出品に紐づいているか調べる。紐づいているならtrueを返す
     * * @param  int  $tag_id
     * @return bool
     */
    public function is_tagging($tag_id)
    {
        // タギング中のタグの中に $tag_idのものが存在するか
        return $this->tags()->where('tag_id', $tag_id)->exists();
    }
}
