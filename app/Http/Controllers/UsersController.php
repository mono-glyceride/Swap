<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
         if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
         }
         
         // ユーザー詳細ビューでそれらを表示
        return view('users.mypage', $user);
         
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        return view('users.edit');
    }

    
    // getでuser/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $data = [];
        // idの値でユーザーを検索して取得
        $user = \App\User::findOrFail($id);
        
        
         //定数を取得
        $age = \App\Consts\UserConst::AGE_LIST[$user->age];
        $gender = \App\Consts\UserConst::GENDER_LIST[$user->gender];
        $prefecture = \App\Consts\UserConst::PREFECTURE_LIST[$user->prefecture];
         
         $data = [
            'user' => $user,
            'age' => $age,
            'prefecture' => $prefecture,
            'gender' => $gender,
            ];
         
         // ユーザー詳細ビューでそれらを表示
         if($user->id === \Auth::user()->id){
            return view('users.show', $data);
         }
         else{
             return view('users.other_show', $data);
         }
    }
    
     //getでusers/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
   {
         // idの値でリクエストを検索して取得
        $user = \Auth::user();
        
        // リクエスト更新ビューでそれらを表示
        return view('users.edit',[
            'user' => $user,    
        ]);
    }

     // putまたはpatchでusers/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'max:255',
            'introduce' => 'max:65535',
        ]);
        
        // userをを更新
       if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
        $user->icon_id = $request->icon_id;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->prefecture = $request->prefecture;
        $user->gender = $request->gender;
        $user->introduce = $request->introduce;
        $user->save();
       }
       
       //リダイレクトさせる
         return redirect()->route('users.show', [$user ->id]);
    }

    public function destroy($id)
    {
        //
    }
    
    //apiに関する表示
    public function api()
    {
        $user = \Auth::user();
        return view('users.api');
    }
}
