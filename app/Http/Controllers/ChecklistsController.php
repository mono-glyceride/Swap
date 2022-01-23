<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecklistsController extends Controller
{
    // getでchecklist/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //認証済みユーザーを取得
        $user = \Auth::user();
        
        // checklist一覧を日付新しい順に10件ずつ取得
        $checklists = $user->checklists()->latest()->paginate(10);
        
        // checklist一覧ビューでそれを表示
        return view('checklists.index', [
            'checklists' => $checklists,
        ]);
        
    }
    
    // pacthでchecklist/にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でチェックリストを検索して取得
        $checklist = \App\Checklist::find($id);
        $checklist->status = $request->status;
        $checklist->save();
        
        // idの値でリクエストを検索して取得
        $proposition = \App\Proposition::find($checklist->proposition_id);
        
        //リダイレクトさせる
        if($checklist->content_id== 1){
            return redirect()->action('PropositionsController@talk',['id' => $proposition->id]);
        }
        else{
            return back();
        }
        
    }
    
    // deleteでchecklist/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $checklist = \App\Checklist::find($id);
        $checklist->delete();

        // リダイレクトさせる。返信のやつならトークへ
        if($checklist->content_id == 1){
            return redirect()->action('PropositionsController@talk',['id' => $checklist->proposition_id]);
        }
        else{
            return back();
            
        }
    }
    
}
