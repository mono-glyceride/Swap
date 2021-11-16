<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Exhibit;
use Storage;

class ExhibitsController extends Controller
{
    // getでexhibit/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // exhibit一覧を取得
        $exhibits = Exhibit::where('exhibits.status',1)->paginate(10);
        
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
            'pic_id' => 'required',
            'character' => 'required|max:255',
            'want_character' => 'required|max:255',
            'mail_flag' => 'required|max:255',
            'handing_flag' => 'required|max:255',
            'origin' => 'max:255',
            'goods_type' => 'max:255',
            'key_wprd' => 'max:255',
            'notes' => 'max:255',
            'want_origin' => 'max:255',
            'want_goods_type' => 'max:255',
            'want_key_word' => 'max:255',
            'want_notes' => 'max:255',
            'place' => 'max:255',
        ]);
        
        
        //画像データを変数$path1,$want_path1に代入＋storage/app/publicに保存
        //$path1 = $request->pic_id->store('public');
        
        //画像データを変数$fileに代入
        $file = $request->file('pic_id');
        
        //アップロードし、パスを取得
        $path1 = Storage::disk('s3')->putFile('/', $file, 'public');
        
        //パスからURLを作成
        $path1 = Storage::disk('s3')->url($path1);
        
        
        if ($request->want_pic_id != null) { // 画像がある場合
        $file = $request->file('want_pic_id');
        $want_path1 = Storage::disk('s3')->putFile('/', $file, 'public');
        $want_path1 = Storage::disk('s3')->url($want_path1);
        }
        else{
            $want_path1 = null;
        }
        
        // 認証済みユーザ（閲覧者）の出品として作成（リクエストされた値をもとに作成）
        $exhibit = $request->user()->exhibits()->create([
            'pic_id' => $path1,
            'origin' => $request->origin,
            'character' => $request->character,
            'goods_type' => $request->goods_type,
            'key_wprd' => $request->key_wprd,
            'condition' => $request->condition,
            'notes' => $request->notes,
            'want_pic_id' => $want_path1,
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
        
        //空白区切りで単語を要素数10の配列$wordsに取り出す（全角と半角の場合あり）
        $words = preg_split('/[\p{Z}\p{Cc}]++/u', $request->key_wprd, 10, PREG_SPLIT_NO_EMPTY);
        
        //配列すべてでループ
        foreach($words as $word){
        
        //既存のタグか
        $tag = DB::table('tags')->where('keyword', $word)->first();
        
        //タグにないなら$wordをタグテーブルのレコードに追加
        if (is_null($tag)) {
        $tag = \App\Tag::create(['keyword' => $word,]);
        }
        
        //タグと出品を紐づけ
        $exhibit->add_tagging($tag->id);
        
        }
        
        //トップにリダイレクト
        return redirect()->action('ExhibitsController@index');
        
        
        
    }

    // getでexhibits/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {   
        $data = [];
        // idの値で出品を検索して取得
        $exhibit = Exhibit::findOrFail($id);
        
        // 出品に対応したリクエスト一覧を取得
        $propositions = $exhibit->propositions;
        
        // 出品したユーザーを取得
        $user = \App\User::findOrFail($exhibit->exhibitor_id);
        
        //画像データを取得
        $path = Storage::disk('s3')->url('$exhibit->pic_id');
        
        
        //定数を取得
        $condition = \App\Consts\ExhibitConst::CONDITION_LIST[$exhibit->condition];
        $mail_flag = \App\Consts\ExhibitConst::MAIL_FLAG_LIST[$exhibit->mail_flag];
        $ship_from = \App\Consts\ExhibitConst::SHIP_FROM_LIST[$exhibit->ship_from ?? 0];
        $days = \App\Consts\ExhibitConst::DAY_LIST[$exhibit->days ?? 0];
        $handing_flag = \App\Consts\ExhibitConst::HANDING_FLAG_LIST [$exhibit->handing_flag];
        
        $data = [
            'exhibit' => $exhibit,
            'propositions' => $propositions,
            'user' => $user,
            'condition' => $condition,
            'mail_flag' => $mail_flag,
            'ship_from' => $ship_from,
            'days' => $days,
            'handing_flag' => $handing_flag,
            'path' => $path
            ];

        
        if (1 === $exhibit->status) {
           // 出品詳細ビューでそれらを表示
        return view('exhibits.show', $data);
        }
        else{
        // 前のURLへリダイレクトさせる
        return back();
        }
    }
    

    // getでexhibits/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでexhibits/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値で出品を検索して取得
        $exhibit = \App\Exhibit::findOrFail($id);
        
        // 出品をを更新
       if (\Auth::id() === $exhibit->exhibitor_id){
        $exhibit->status = $request->status;    // 追加
        $exhibit->save();
       }
       
       //リダイレクトさせる
         return redirect()->action('PropositionsController@index');
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
        
        // 認証済みユーザを取得
        $user = \App\User::findOrFail($id);
        
        
        // ユーザーの出品一覧を取得
        $exhibits =$user->exhibits()->where('exhibits.status',1)->paginate(10);
        //$exhibits = $user->exhibits->paginate(2);
        
        // exhibit一覧ビューでそれを表示
        return view('mypage.wanted', [
            'exhibits' => $exhibits,
            'user'=>$user,
        ]);
        
    }
    
    // getでsearchにアクセスされた場合の検索結果表示処理
    public function search(Request $request)
    {
        //空白区切りで単語を最大要素数10の配列$wordsに取り出す（全角と半角の場合あり）
        $words = preg_split('/[\p{Z}\p{Cc}]++/u', $request->keyword, 10, PREG_SPLIT_NO_EMPTY);
        
        $exhibit_ids = array();
        //ワード配列すべてでループ
        foreach($words as $word){
            $tag = DB::table('tags')->where('keyword','like','%'.$word.'%')->first();
            
            //入力された文字と部分一致するタグが見つかった場合
            if (!is_null($tag)) {
            $tag_id = $tag->id;
            //中間テーブル(exhibit_tagging)からtag_idカラムに$tag_idとつながるexhibit_idを取り出す
            $exhibit_ids = $exhibit_ids + DB::table('exhibit_tagging')->where('tag_id', $tag_id)->pluck('exhibit_id')->toArray();
            }
        }
        
        //取得した出品を絞り込み日付順にして、ページネーション
        if (empty($exhibit_ids)) {
            $exhibits = null;
        }
        else{
            $exhibits = Exhibit::whereIn('id',$exhibit_ids)->where('status', 1)->latest()->paginate(10);
        }
        
        $keyword = $request->keyword;
        // exhibit一覧ビューでそれを表示
        return view('exhibits.search', [
            'exhibits' => $exhibits,
            'keyword'=>$keyword,
        ]);
    }
    
    
}