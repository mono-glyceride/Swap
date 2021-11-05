<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'user_id','content_id','status','exhibit_id','proposition_id',
    ];
    
    /**
     * このチェックリストを所有するプロポジション。（ Propositionモデルとの関係を定義）
     */
    public function proposition()
    {
        return $this->belongsTo(Proposition::class);
    }
    
    /**
     * このチェックリストを所有するexhibit。（ Propositionモデルとの関係を定義）
     */
    public function exhibit()
    {
        return $this->belongsTo(Exhibit::class);
    }
    
    /**
     * このチェックリストの宛先ユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
