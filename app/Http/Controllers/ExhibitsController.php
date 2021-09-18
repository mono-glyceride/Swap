<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exhibit;

class ExhibitsController extends Controller
{
    // getでexhibit/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // exhibit一覧を取得
        $exhibits = Exhibit::paginate(10);

        // exhibit一覧ビューでそれを表示
        return view('exhibits.index', [
            'exhibits' => $exhibits,
        ]);
        
    }

    // getでexhibits/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //
        return view('exhibits.create');
    }

    // postでexhibits/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'pic_id' => 'required|max:255',
            'origin' => 'required|max:255',
            'character' => 'required|max:255',
            'goods_type' => 'required|max:255',
            'condition' => 'required|max:255',
            'want_pic_id' => 'required|max:255',
            'want_origin' => 'required|max:255',
            'want_character' => 'required|max:255',
            'want_goods_type' => 'required|max:255',
            'mail_flag' => 'required|max:255',
            'ship_from' => 'required|max:255',
            'handing_flag' => 'required|max:255',
        ]);
        
        
        //画像データを変数$path1,$want_path1に代入＋storage/app/publicに保存
        $path1 = $request->pic_id->store('public');
        $want_path1 = $request->want_pic_id->store('public');
        
        // 認証済みユーザ（閲覧者）の出品として作成（リクエストされた値をもとに作成）
        $request->user()->exhibits()->create([
            'pic_id' => basename($path1),
            'origin' => $request->origin,
            'character' => $request->character,
            'goods_type' => $request->goods_type,
            'key_wprd' => $request->key_wprd,
            'condition' => $request->condition,
            'notes' => $request->notes,
            'want_pic_id' => basename($want_path1),
            'want_origin' => $request->want_origin,
            'want_character' => $request->want_character,
            'want_goods_type' => $request->want_goods_type,
            'want_key_word' => $request->want_key_word,
            'want_notes' => $request->want_notes,
            'mail_flag' => $request->mail_flag,
            'ship_from' => $request->ship_from,
            'days' => $request->days,
            'handing_flag' => $request->handing_flag,
            'place' => $request->place,
        ]);
        
        
        
        // トップへリダイレクトさせる
         return redirect()->action('ExhibitsController@index');
        
    }

    // getでexhibits/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {   
        $data = [];
        // idの値で出品を検索して取得
        $exhibit = Exhibit::findOrFail($id);
        
        // 出品に対応したリクエスト一覧を取得
        $requests = $exhibit->requests;
        
        // 出品したユーザーを取得
        $user = \App\User::findOrFail($exhibit->exhibitor_id);
        
        
        
        //定数を取得
        $condition = \App\Consts\ExhibitConst::CONDITION_LIST[$exhibit->condition];
        $mail_flag = \App\Consts\ExhibitConst::MAIL_FLAG_LIST[$exhibit->mail_flag];
        $ship_from = \App\Consts\ExhibitConst::SHIP_FROM_LIST[$exhibit->ship_from];
        $days = \App\Consts\ExhibitConst::DAY_LIST[$exhibit->days];
        $handing_flag = \App\Consts\ExhibitConst::HANDING_FLAG_LIST [$exhibit->condition];
        
        $data = [
            'exhibit' => $exhibit,
            'requests' => $requests,
            'user' => $user,
            'condition' => $condition,
            'mail_flag' => $mail_flag,
            'ship_from' => $ship_from,
            'days' => $days,
            'handing_flag' => $handing_flag
            ];

        // 出品詳細ビューでそれらを表示
        return view('exhibits.show', $data);
    }
    

    // getでexhibits/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでexhibits/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
    }

    // deleteでexhibits/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $exhibit = \App\Exhibit::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $exhibit->exhibitor_id) {
            $exhibit->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    // getでexhibits/（任意のid）にアクセスされた場合の出品一覧表示処理
    public function wanted($id)
    {   
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
        
        
        // ユーザーの出品一覧を取得
        $exhibits =$user->exhibits()->paginate(2);
        //$exhibits = $user->exhibits->paginate(2);

        // exhibit一覧ビューでそれを表示
        return view('mypage.wanted', [
            'exhibits' => $exhibits,
        ]);
        }
        
    }
    
    
}