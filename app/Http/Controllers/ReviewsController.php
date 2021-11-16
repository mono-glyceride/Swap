<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    // getでreview/にアクセスされた場合の「一覧表示処理」
    public function index($id)
    {
        // idの値でユーザーを検索して取得
        $user = \App\User::findOrFail($id);
        
        // review一覧を取得
        $reviews = \App\Review::where('reviews.user_id',$id)->paginate(20);
        
        // exhibit一覧ビューでそれを表示
        return view('reviews.index', [
            'reviews' => $reviews,
        ]);
        
    }
}
