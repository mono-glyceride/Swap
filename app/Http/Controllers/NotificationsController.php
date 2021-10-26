<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    // getでexhibit/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //認証済みユーザーを取得
        $user = \Auth::user();
        
        // notification一覧を取得
        $notification = $user->notifications()->where('Notifications.status','<>',0)->paginate(10);
        
        // notification一覧ビューでそれを表示
        return view('notification.index', [
            'notification' => $notification,
        ]);
        
    }
    
    // postでexhibit/にアクセスされた場合の「新規登録処理」
    public function store()
    {
        // バリデーション
        $request->validate([
        ]);
        
        //該当するリクエストの通知として作成
        \App\Message::create([
            'request_id' => $request->request_id,
            'content' => $request->content,
            'sender_id' => $request->sender_id,
        ]);
        
        
        //リダイレクトさせる
         return back();
        
    }
}
