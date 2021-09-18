<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      // getでrequest/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            // ユーザの貰った交換リクエスト一覧を取得
            $receive_requests = $user->receive_requests()->where('requests.status',1)->get();
            
            // ユーザの送った交換リクエスト一覧を取得
            $requests = $user->requests()->where('requests.status',1)->get();
            
            // ユーザの送った交換リクエストで、拒否されたもの一覧を取得
            $reject_requests = $user->requests()->where('requests.status',3)->get();
            
            $data = [
                'user' => $user,
                'receive_requests' => $receive_requests,
                'requests' => $requests,
                'reject_requests' => $reject_requests,
            ];
        }

        // request.でそれらを表示
        return view('requests/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id) 
    {
        //
        return view('requests.create',[
            'exhibit_id' => $id,    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      // postでrequests/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'pic_id' => 'required',
            'mail_flag' => 'required',
            'handing_flag' => 'required',
            'place' => 'max:255',
            'notes' => 'max:255',
        ]);
        
        
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
        $requ_path1 = $request->pic_id->store('public');
        
        
        
        
        // 認証済みユーザ（閲覧者）のリクエストとして作成（リクエストされた値をもとに作成）
        $request->user()->requests()->create([
            'exhibit_id' => $request->exhibit_id,
            'pic_id' => basename($requ_path1),
            'mail_flag' => $request->mail_flag,
            'ship_from' => $request->ship_from,
            'days' => $request->days,
            'handing_flag' => $request->handing_flag,
            'place' => $request->place,
            'condition' => $request->condition,
            'notes' => $request->notes,
        ]);
        
         // トップへリダイレクトさせる
         return redirect()->action('ExhibitsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     // getでrequests/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {   
        // idの値でリクエストを検索して取得
        $request = \App\Request::findOrFail($id);
        
        // 対応する自分の出品を検索して取得
        $exhibit = $request->exhibit;

        // リクエスト詳細ビューでそれらを表示
        return view('requests.show',[
            'request' => $request,    
            'exhibit' => $exhibit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
         // idの値でリクエストを検索して取得
        $request = \App\Request::findOrFail($id);
        
        if (\Auth::id() === $request->exhibit()->first()->exhibitor_id) {
        
        // 対応する自分の出品を検索して取得
        $exhibit = $request->exhibit;
        
        //定数を取得
        $condition = \App\Consts\ExhibitConst::CONDITION_LIST[$request->condition];
        $mail_flag = \App\Consts\ExhibitConst::MAIL_FLAG_LIST[$request->mail_flag];
        $ship_from = \App\Consts\ExhibitConst::SHIP_FROM_LIST[$request->ship_from];
        $days = \App\Consts\ExhibitConst::DAY_LIST[$request->days];
        $handing_flag = \App\Consts\ExhibitConst::HANDING_FLAG_LIST [$request->condition];
        
        $data = [
            'exhibit' => $exhibit,
            'request' => $request,
            'condition' => $condition,
            'mail_flag' => $mail_flag,
            'ship_from' => $ship_from,
            'days' => $days,
            'handing_flag' => $handing_flag
            ];


        // リクエスト更新ビューでそれらを表示
        return view('requests.edit', $data);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // idの値でリクエストを検索して取得
        $receive_request = \App\Request::findOrFail($id);
        
        // リクエストをを更新
       if (\Auth::id() === $receive_request->exhibit()->first()->exhibitor_id){
        $receive_request->status = $request->status;    // 追加
        $receive_request->save();
       }
       
       //リダイレクトさせる
         return redirect()->action('RequestsController@index');
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
    
    // getでswapping/（任意のid）にアクセスされた場合の取引中一覧表示処理
    public function swapping($id)
    {   
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
        
        
        // ユーザーのリクエスト一覧のうち、取引中のものを抽出
        $swapping_requests = $user->requests()->where('requests.status',2)->get();
        
        // ユーザーが貰ったリクエスト一覧のうち、取引中ものを抽出
        $swapping_recieve_requests = $user->receive_requests()->where('requests.status',2)->get();
        
        // ユーザーのリクエスト一覧のうち、取引が終了したのものを抽出
        $finished_requests = $user->requests()->where('requests.status',4)->get();
        
        // ユーザーが貰ったリクエスト一覧のうち、取引が終了したものを抽出
        $finished_recieve_requests = $user->receive_requests()->where('requests.status',4)->get();
        

        $data = [
                'receive_requests' => $swapping_recieve_requests,
                'requests' => $swapping_requests,
                'finished_receive_requests' => $finished_recieve_requests,
                'finished_requests' => $finished_requests,
            ];
            
        // exhibit一覧ビューでそれを表示
        return view('mypage.swapping', $data);
        }
    }
    
    //自分が出品者の取引
    public function talk($id)
    {   
        
        $data = [];
        //バリデーション！　
        
            // 認証済みユーザを取得
            $user = \Auth::user();
        
            
            // idの値でリクエストを検索して取得
            $receive_request = \App\Request::findOrFail($id);
            
                
        
            // リクエストの持つメッセージ一覧を作成日時の降順で取得
            $messages = $receive_request->messages()->orderBy('created_at')->get();
        
            // 対応する出品を検索して取得
            $exhibit = $receive_request->exhibit;
            
            //　自分が出品者じゃないとき（）
                if ($exhibit->exhibitor_id != $user->id) {
                    
                    $partner = \App\User::findOrFail($receive_request->requester_id);
                    
                }
                else{
                    $partner = \App\User::findOrFail($exhibit->exhibitor_id);
                }
                
        

            $data = [
                'receive_request' => $receive_request,
                'exhibit' => $exhibit,
                'messages' => $messages,
                'user'=>$user,
                'partner'=>$partner
                ];
            
            if ($user->id === $receive_request->requester_id || $user->id === $exhibit->exhibitor_id) { // 出品者かリクエスターの場合
            // トーク画面でそれを表示
            return view('requests.talk', $data);
            }
            else{
                return redirect()->action('ExhibitsController@index');
            }
    
        
    }
        
        
    
    
    
}
