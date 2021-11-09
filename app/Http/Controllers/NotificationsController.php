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
        
        // notification一覧を日付新しい順に10件ずつ取得
        $notifications = $user->notifications()->where('status','<>',0)->latest()->paginate(10);
        
        // notification一覧ビューでそれを表示
        return view('notifications.index', [
            'notifications' => $notifications,
        ]);
        
    }
    
    // postでexhibit/にアクセスされた場合の「新規登録処理」
    public function store(Request $request, $id)
    {
        // バリデーション
        $request->validate([
        ]);
        
        
        
        
    }
    
    // patchでnotification/にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でチェックリストを検索して取得
        $notification = \App\Notification::find($id);
        $notification->status = $request->status;
        $notification->save();
        
        
        //リダイレクトさせる
            return redirect()->action('ExhibitsController@show',['exhibit' => $notification->exhibit_id]);
        
    }
}
