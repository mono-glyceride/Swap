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
            'user'=>$user,
        ]);
        
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'comment' => 'max:255',
        ]);
        
        //認証済みユーザー
        $user = \Auth::user();
        
        //関連する取引
        $proposition = \App\Proposition::find($request->proposition_id);
        
        //レビューされる相手ユーザー
        $partner_id = $proposition->partner($user->id);
        
        // 認証済みユーザ（閲覧者）からの評価として作成
        $user = $request->user()->reviewings()->create([
            'user_id' => $partner_id,
            'point' => $request->point,
            'comment' => $request->comment,
        ]);
        
        //リダイレクト
        return back();
    }
}
