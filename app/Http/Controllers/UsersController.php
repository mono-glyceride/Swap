<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
         }
         
         // ユーザー詳細ビューでそれらを表示
        return view('users.mypage', $user);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return view('users.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // getでuser/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $data = [];
        $user = \Auth::user();
        
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
         return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //getでusers/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
   {
         // idの値でリクエストを検索して取得
        $user = \App\User::findOrFail($id);
        
        // リクエスト更新ビューでそれらを表示
        return view('users.edit',[
            'user' => $user,    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでusers/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // dd($request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
