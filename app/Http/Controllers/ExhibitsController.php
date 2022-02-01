<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Exhibit;
use App\Tag;
use Storage;

class ExhibitsController extends Controller
{
    // getでexhibit/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // exhibit一覧を取得
        $exhibits = Exhibit::where('exhibits.status',1)->paginate(15);
        
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
            'origin' => 'required|max:255',
            'keyword' => 'max:255',
            'goods_type' => 'max:255',
            'character' => 'required|max:255',
            'want_character' => 'required|max:255',
            'shipping' => 'required',
            'place' => 'max:255',
            'notes' => 'max:255',
        ]);
        
        
        //画像データを変数$path1,$want_path1に代入＋storage/app/publicに保存
        //$path1 = $request->pic_id->store('public');
        
        //画像データを変数$fileに代入
        $file = $request->file('pic_id');
        
        //アップロードし、パスを取得
        $path1 = Storage::disk('s3')->putFile('/', $file, 'public');
        
        //パスからURLを作成
        $path1 = Storage::disk('s3')->url($path1);
        
        
        //交換方法　1：対応する 2:対応しない
        $mail_flag = 1;
        $handing_flag = 1;
        
        if($request->shipping == 1){
            $handing_flag = 2;
        }
        
        if($request->shipping == 2){
            $mail_flag = 2;
        }
        
        // 認証済みユーザ（閲覧者）の出品として作成（リクエストされた値をもとに作成）
        $exhibit = $request->user()->exhibits()->create([
            'pic_id' => $path1,
            'notes' => $request->notes,
            'mail_flag' => $mail_flag,
            'handing_flag' => $handing_flag,
            'place' => $request->place,
        ]);
        
        //タグになり得るものを空白も含め配列にする
        $user_enter_words = array($request->origin,$request->keyword,$request->goods_type,$request->character,$request->want_character);
        
        //TagsControllerの処理を呼び出す
        $called = app()->make('App\Http\Controllers\TagsController');
        $called->store($user_enter_words, $exhibit);
        
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
        
        //タグを分類して取得(タグ、グッズタイプ、作品)
        
        // 出品したユーザーを取得
        $user = \App\User::findOrFail($exhibit->exhibitor_id);
        
        //画像データを取得
        $path = Storage::disk('s3')->url('$exhibit->pic_id');
        
        //定数を取得
        $mail_flag = \App\Consts\ExhibitConst::MAIL_FLAG_LIST[$exhibit->mail_flag];
        $handing_flag = \App\Consts\ExhibitConst::HANDING_FLAG_LIST [$exhibit->handing_flag];
        
        $data = [
            'exhibit' => $exhibit,
            'propositions' => $propositions,
            'user' => $user,
            'mail_flag' => $mail_flag,
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
        
        // $idのユーザを取得（認証ユーザーではないかも）
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
    
    // getでquickfindにアクセスされた場合の検索結果表示処理
    public function quickfind(Request $request)
    {
        
        //空白区切りで単語を最大要素数10の配列$wordsに取り出す（全角と半角の場合あり）
        $words = preg_split('/[\p{Z}\p{Cc}]++/u', $request->keyword, 10, PREG_SPLIT_NO_EMPTY);
        
        $exhibit_ids = array();
        //ワード配列すべてでループ
        foreach($words as $word){
            //部分一致するタグをすべて取り出す
<<<<<<< HEAD
            $like_tags = DB::table('tags')->where('keyword','like','%'.$word.'%')->get();
            
            //入力された文字と部分一致するタグが見つかった場合
            if (!is_null($like_tags)) {
                
                //同じ入力文字に関連するタグ、に関連するexhibit_idの配列
                $like_tag_exhibit_ids= array();
                
                //$like_tagsは同じ入力文字に関連するタグ
                foreach($like_tags as $like_tag){
                    
                    $like_tag_id = $like_tag->id;
                    
                    //中間テーブル(exhibit_tagging)からtag_idカラムに$like_tag_idとつながるexhibit_idを取り出す
                    $temp_array = DB::table('exhibit_tagging')->where('tag_id', $like_tag_id)->pluck('exhibit_id')->toArray();
                    
                    //同じ入力文字に関連するタグのexhibit_idの配列に連結
                    $like_tag_exhibit_ids = array_merge($like_tag_exhibit_ids, $temp_array);
                }
            }
            
            if(empty($exhibit_ids)){
                $exhibit_ids = $like_tag_exhibit_ids;
=======
            $tags = DB::table('tags')->where('keyword','like','%'.$word.'%')->get();
            
            //入力された文字と部分一致するタグが見つかった場合
            if (!is_null($tags)) {
                foreach($tags as $tag){
                    $tag_id = $tag->id;
                    //中間テーブル(exhibit_tagging)からtag_idカラムに$tag_idとつながるexhibit_idを取り出す
                    $tagging_exhibit_ids = DB::table('exhibit_tagging')->where('tag_id', $tag_id)->pluck('exhibit_id')->toArray();
                    //他のタグに関連するexhibit_idの配列に連結
                    $exhibit_ids = array_merge($exhibit_ids, $tagging_exhibit_ids);
                }
>>>>>>> 7b651720cbda231959893a84880f693611901b2a
            }
            
            //他のタグに関連するexhibit_idと、重複するexhibit_idのみを配列に取り出す
            $exhibit_ids = array_intersect($exhibit_ids, $like_tag_exhibit_ids);
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
        return view('exhibits.quickfind', [
            'exhibits' => $exhibits,
            'character'=>null,
            'want_character'=>null,
            'keyword'=>$keyword,
        ]);
    }
    
    // getでexploreにアクセスされた場合の表示処理
    public function explore(){
        return view('exhibits.explore');
    }
    
    public function search(Request $request){
        
        $character_much_ids = $this->find_exhibits($request->character,3);
        
        $want_character_much_ids = $this->find_exhibits($request->want_character,4);
        
        $keyword_much_ids = $this->find_exhibits($request->keyword,1);
        
        $union_ids = [$character_much_ids, $want_character_much_ids, $keyword_much_ids];
        
        $exhibit_ids = array();
        
        foreach($union_ids as $union_id){
            
            //中身があった
            if(!empty($union_id)){
                
                //中身があった配列は初めて
                if(empty($exhibit_ids)){
                    $exhibit_ids = $union_id;
                }
                else{
                    //既に見つかった配列と重複するexhibit_idのみに絞り込み
                    $exhibit_ids = array_intersect($exhibit_ids, $union_id);
                }
            }
        }
        
        //取得した出品を絞り込み日付順にして、ページネーション
        if (empty($exhibit_ids)) {
            $exhibits = null;
        }
        else{
            $exhibits = Exhibit::whereIn('id',$exhibit_ids)->where('status', 1)->latest()->paginate(10);
        }
        
        
        return view('exhibits.quickfind', [
            'exhibits' => $exhibits,
            'character'=>$request->character,
            'want_character'=>$request->want_character,
            'keyword'=>$request->keyword
        ]);
        
    }
    
    //渡された文字列を正規化し、一致するタグを持つExhibitのidを配列にして返す
    //$kind_flg 0:作品 1:キーワード 2:グッズタイプ 3:譲るキャラ 4:求めるキャラ
    public function find_exhibits($user_enter, $kind_flg){
        
        //空白区切りで単語を最大要素数10の配列$wordsに取り出す（全角と半角の場合あり）
        $words = preg_split('/[\p{Z}\p{Cc}]++/u', $user_enter, 10, PREG_SPLIT_NO_EMPTY);
        
        $exhibit_ids = array();
        //ワード配列すべてでループ
        foreach($words as $word){
            //単語、分類ともに完全一致するタグを取り出す（重複しないので一つに絞られる)
            $much_tag = DB::table('tags')->where('keyword',$word)->where('kind_flg',$kind_flg)->first();
            
            $temp_array = array();
            //完全一致するタグが見つかった場合
            if (!is_null($much_tag)) {
                    $much_tag_id = $much_tag->id;
                    
                    //中間テーブル(exhibit_tagging)からtag_idカラムに$much_tag_idとつながるexhibit_idを取り出す
                    $temp_array = DB::table('exhibit_tagging')->where('tag_id', $much_tag_id)->pluck('exhibit_id')->toArray();
            }
            
            //一個目の単語の場合、$exhibit_idsにそのままコピー
            if(empty($exhibit_ids)){
                $exhibit_ids = $temp_array;
            }
            
            //他のタグに関連するexhibit_idと、重複するexhibit_idのみを配列に取り出す
            $exhibit_ids = array_intersect($exhibit_ids, $temp_array);
        }
        return $exhibit_ids;
    } 
}