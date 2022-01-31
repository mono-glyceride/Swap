<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibit extends Model
{
    protected $fillable = [
        'pic_id','thumbnail', 'notes','mail_flag','handing_flag','place'
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
    
    /**
     * $thisに紐づいた保留中のPropositionがあるかどうか。あるならtrue
     * @return bool
     */
    public function is_proposed()
    {
        return $this->propositions()->where('status', 1)->exists();
    }
    
    /**
     * $thisに紐づいたタグを$kind_flgに応じて分類して返す。
     * 返す際にはすべてのタグの中身（keywordカラム）を連結し一つの文字列として返す
     */
    public function categorize_tags($kind_flg)
    {
        $categorize_tags = $this->tags()->where('kind_flg',$kind_flg)->get();
        $string_tag = '';
        if($categorize_tags->isNotEmpty()){
            foreach($categorize_tags as $categorize_tag){
                $string_tag = $string_tag. $categorize_tag->keyword.'　';
            }
        }
        return $string_tag;
    }
    
}
