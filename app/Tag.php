<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'keyword'
    ];
    
    /**
     * このタグと紐づいた出品。（ Exhibitモデルとの関係を定義）
     */
    public function exhibits()
    {
        return $this->belongsToMany(Exhibit::class,'exhibit_tagging')->withTimestamps();
    }
    
    
}
