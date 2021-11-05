<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Proposition;
use App\Checklist;

class propositionsController extends Controller
{
      // getでproposition/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            // ユーザの貰った交換リクエスト一覧を取得
            $receive_propositions = $user->receive_propositions()->where('propositions.status',1)->get();
            
            // ユーザの送った交換リクエスト一覧を取得
            $propositions = $user->propositions()->where('propositions.status',1)->get();
            
            // ユーザの送った交換リクエストで、拒否されたもの一覧を取得
            $reject_propositions = $user->propositions()->where('propositions.status',3)->get();
            
            $data = [
                'user' => $user,
                'receive_propositions' => $receive_propositions,
                'propositions' => $propositions,
                'reject_propositions' => $reject_propositions,
            ];
        }

        // proposition.でそれらを表示
        return view('propositions.index', $data);
    }

    public function create_mail(Request $request, $id) 
    {
        //
        return view('propositions.create_mail',[
            'exhibit_id' => $id,    
        ]);
    }
    
    public function create_handing(Request $request, $id) 
    {
        //
        return view('propositions.create_handing',[
            'exhibit_id' => $id,    
        ]);
    }

      // postでpropositions/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'pic_id' => 'required',
            'place' => 'max:255',
            'notes' => 'max:255',
        ]);
        
        //'mail_flag' とhanding_flag'はどちらか一方必ずvalidateすべきだけど、hiddenで自動的に入力されるので。
        /*
        // 画像を読み込む
        $image = \Image::make($request->pic_id);
        // EXIFのOrientationによって回転させる
        $image->orientate();
        // リサイズする
        $image->resize(200, null,
            function ($constraint) {
                // 縦横比を保持したままにする
                $constraint->aspectRatio();
                // 小さい画像は大きくしない
                $constraint->upsize();
            }
        );
        */
        
        //画像データを変数$requ_path1に代入＋storage/app/publicに保存
        //$requ_path1 = $request->pic_id->store('public');
        
        //画像データを変数$fileに代入
        $file = $request->file('pic_id');
        
        //アップロードし、パスを取得
        $requ_path1 = Storage::disk('s3')->putFile('/', $file, 'public');
        
        //パスからURLを作成
        $requ_path1 = Storage::disk('s3')->url($requ_path1);
        
        // 認証済みユーザ（閲覧者）のリクエストとして作成（リクエストされた値をもとに作成）
        $proposition = $request->user()->propositions()->create([
            'exhibit_id' => $request->exhibit_id,
            'pic_id' => $requ_path1,
            'mail_flag' => $request->mail_flag,
            'ship_from' => $request->ship_from,
            'days' => $request->days,
            'handing_flag' => $request->handing_flag,
            'place' => $request->place,
            'condition' => $request->condition,
            'notes' => $request->notes,
        ]);
        
        //リクエストの可否を出品者のやることリストに追加
        $exhibit = \App\Exhibit::find($request->exhibit_id);
        
        $proposition->checklists()->create([
            'user_id' => $exhibit->exhibitor_id,
            'content_id' => 3,
            'proposition_id' => $proposition->id,
            ]);
        
        
         // トップへリダイレクトさせる
         return redirect()->action('ExhibitsController@index');
    }

     // getでpropositions/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {   
        // idの値でリクエストを検索して取得
        $proposition = \App\Proposition::findOrFail($id);
        
        
        //認証ユーザーがリクエストを送ったユーザーなら
        if ($proposition->user_id == \Auth::id()) {
        
        // 対応する出品を検索して取得
        $exhibit = $proposition->exhibit;
        
        //定数を取得
        $condition = \App\Consts\ExhibitConst::CONDITION_LIST[$proposition->condition];
        $ship_from = \App\Consts\ExhibitConst::SHIP_FROM_LIST[$proposition->ship_from ?? 0];
        $days = \App\Consts\ExhibitConst::DAY_LIST[$proposition->days ?? 0];
        
        // リクエスト詳細ビューでそれらを表示
        return view('propositions.show',[
            'proposition' => $proposition,    
            'exhibit' => $exhibit,
            'condition' => $condition,
            'ship_from' => $ship_from,
            'days' => $days,
        ]);
        }
    }

    //リクエストの許可を選ぶ画面
    public function edit($id)
    {
        $data = [];
         // idの値でリクエストを検索して取得
        $proposition = \App\Proposition::findOrFail($id);
        
        //認証ユーザーがリクエストをもらった人物なら
        if (\Auth::id() === $proposition->exhibit()->first()->exhibitor_id) {
        
        // 対応する自分の出品を検索して取得
        $exhibit = $proposition->exhibit;
        
        //定数を取得
        $condition = \App\Consts\ExhibitConst::CONDITION_LIST[$proposition->condition];
        $mail_flag = \App\Consts\ExhibitConst::MAIL_FLAG_LIST[$proposition->mail_flag ?? 0];
        $ship_from = \App\Consts\ExhibitConst::SHIP_FROM_LIST[$proposition->ship_from ?? 0];
        $days = \App\Consts\ExhibitConst::DAY_LIST[$proposition->days ?? 0];
        $handing_flag = \App\Consts\ExhibitConst::HANDING_FLAG_LIST [$proposition->handing_flag ?? 0];
        
        $data = [
            'exhibit' => $exhibit,
            'proposition' => $proposition,
            'condition' => $condition,
            'mail_flag' => $mail_flag,
            'ship_from' => $ship_from,
            'days' => $days,
            'handing_flag' => $handing_flag
            ];


        // リクエスト更新ビューでそれらを表示
        return view('propositions.edit', $data);
        }
        
    }
    
    //リクエストの許可を決定する
    public function update(Request $request, $id)
    {
        // idの値でリクエストを検索して取得
        $receive_proposition = \App\Proposition::findOrFail($id);
        
        // リクエストをを更新
       if (\Auth::id() === $receive_proposition->exhibit()->first()->exhibitor_id || \Auth::id() ===$receive_proposition->proposition_id){
        $receive_proposition->status = $request->status;
        $receive_proposition->save();
       
       
        //  不成立通知を作成
        if($request->status == 3){
            $receive_proposition->notifications()->create([
            'user_id' => $receive_proposition->user_id,
            'content_id' => 0,
            'proposition_id' => $receive_proposition->id,
            ]);
            }
        //取引開始をリクエストしたユーザーのチェックリストに追加
        else{
            $receive_proposition->checklists()->create([
            'user_id' => $receive_proposition->user_id,
            'content_id' => 0,
            'proposition_id' => $receive_proposition->id,
            ]);
            }
        
        
        //出品者に交換リクエストの返答を求めるチェックリストを削除
        //この交換リクエストのもつ通知のうち、出品者あてのもの
        $checklist = $receive_proposition->checklists()->where('user_id',\Auth::id())->first();
        //論理削除
        $checklist->status = 0;
        $checklist->save();
       
        }
       //リダイレクトさせる
         return redirect()->action('PropositionsController@talk',['id' => $receive_proposition->id]);
    }

    public function destroy($id)
    {
        //
    }
    
    // getでswapping/（任意のid）にアクセスされた場合の取引中一覧表示処理
    public function swapping($id)
    {   
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
        
        
        // ユーザーのリクエスト一覧のうち、取引中のものを抽出
        $swapping_propositions = $user->propositions()->where('propositions.status',2)->get();
        
        // ユーザーが貰ったリクエスト一覧のうち、取引中ものを抽出
        $swapping_recieve_propositions = $user->receive_propositions()->where('propositions.status',2)->get();
        
        // ユーザーのリクエスト一覧のうち、取引が終了したのものを抽出
        $finished_propositions = $user->propositions()->where('propositions.status',4)->get();
        
        // ユーザーが貰ったリクエスト一覧のうち、取引が終了したものを抽出
        $finished_recieve_propositions = $user->receive_propositions()->where('propositions.status',4)->get();
        

        $data = [
                'receive_propositions' => $swapping_recieve_propositions,
                'propositions' => $swapping_propositions,
                'finished_receive_propositions' => $finished_recieve_propositions,
                'finished_propositions' => $finished_propositions,
            ];
            
        // exhibit一覧ビューでそれを表示
        return view('mypage.swapping', $data);
        }
    }
    
    public function talk($id)
    {   
        
        $data = [];
        //バリデーション！　
        
            // 認証済みユーザを取得
            $user = \Auth::user();
        
            
            // idの値でリクエストを検索して取得
            $proposition = \App\Proposition::find($id);
            
        
            // リクエストの持つメッセージ一覧を作成日時の降順で取得
            $messages = $proposition->messages()->orderBy('created_at')->get();
        
            // 対応する出品を検索して取得
            $exhibit = $proposition->exhibit;
            
            //相手ユーザーの情報　自分が出品者じゃないとき
                if ($exhibit->exhibitor_id == $user->id) {
                    $partner = \App\User::find($proposition->user_id);
                }
                else{
                    $partner = \App\User::find($exhibit->exhibitor_id);
                }
                

            $data = [
                'proposition' => $proposition,
                'exhibit' => $exhibit,
                'messages' => $messages,
                'user'=>$user,
                'partner'=>$partner
                ];
            
            if ($user->id === $proposition->user_id || $user->id === $exhibit->exhibitor_id) { // 出品者かリクエスターの場合
            // トーク画面でそれを表示
            return view('propositions.talk', $data);
            }
            else{
                return redirect()->action('ExhibitsController@index');
            }
    
        
    }
        
        
    
    
    
}
