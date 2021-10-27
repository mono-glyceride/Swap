<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{   
    // getでmessage/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        
    }

    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        
        // バリデーション
        $request->validate([
            'content' => 'required',
        ]);
        
        \App\Message::create([
            'proposition_id' => $request->proposition_id,
            'content' => $request->content,
            'sender_id' => $request->sender_id,
        ]);
        
        
        //リダイレクトさせる
         return back();
        
    }

    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {   
       
        //
    }
    

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        
    }
    
    

}
