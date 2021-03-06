<?php

namespace App\Http\Controllers;
use App\Proposition;
use Illuminate\Http\Request;

class MessagesController extends Controller
{   
    // getでmessage/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $user = \Auth::user();
        
        //ユーザーが関わる取引のid
        $dealing_ids = $user->dealings();
        
        if (empty($dealing_ids)) {
            $dealings = null;
        }
        else{
            $dealings = Proposition::whereIn('id',$dealing_ids)->latest()->paginate(10);
        }
        
        //ユーザー関わった取引一覧、新しい順で
        return view('messages.index' ,[
            'dealings' => $dealings,
            'user' => $user
            ]);
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
        
        $user = \Auth::user();
        
        \App\Message::create([
            'proposition_id' => $request->proposition_id,
            'content' => $request->content,
            'user_id' => $user->id,
        ]);
        
        //相手ユーザーのチェックリストに返信を追加
        $proposition = \App\Proposition::find($request->proposition_id);
        
        //相手ユーザー
        $partner = $proposition->partner($user->id);
        
        $proposition->checklists()->create([
            'user_id' => $partner->id,
            'content_id' => 1,
            'proposition_id' => $proposition->id,
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
