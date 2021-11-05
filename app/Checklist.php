<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'user_id','content_id','status','proposition_id',
    ];
    
    /**
     * このチェックリストを所有するプロポジション。（ Propositionモデルとの関係を定義）
     */
    public function proposition()
    {
        return $this->belongsTo(Proposition::class);
    }
    
    /**
     * このチェックリストの宛先ユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
