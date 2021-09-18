@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            
            
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                    {{-- 戻るボタン --}}
                    @include('../commons.back_button')
                    交換リクエスト詳細
                </h1>
            </div>
            
            <div class="goods_pair">
                <h2 class="border border-primary">
                    あなたが貰うグッズ
                </h2>
            
                <div>
                    {{-- グッズ画像 --}}
                    <img src="img.jpg" class="{{ asset('storage/images/icon.png') }}"  width="200" height="200">
                    <table class="table table-striped table-sm goods_detail">
                        <tr><th>状態</th><td>未開封</td></tr>
                        <tr><th>郵送</th><td>対応あり</td></tr>
                        <tr><th>発送元の地域</th><td>宮崎県</td></tr>
                        <tr><th>発送までの日数</th><td>4～7日</td></tr>
                        <tr><th>手渡し</th><td>対応なし</td></tr>
                        <tr><th>手渡し対応地域</th><td>なし</td></tr>
                        <tr><th>備考</th><td>なし</td></tr>
                    </table>
                </div>
                
                
            </div>
            
            <div class="goods_pair">
                <h2 class="border border-primary">
                    あなたが譲るグッズ
                </h2>
            
                <div>
                    {{-- グッズ画像 --}}
                    <img src="img.jpg" class="{{ asset('storage/images/icon.png') }}"  width="200" height="200">
                </div>
            </div>
            
           
            <div>
                {{-- 出品者のアイコン --}}
                <h2 class="border border-primary">
                    リクエストユーザー
                </h2>
                <img src="{{ asset('storage/images/icon.png') }}" class="img-responsive img-rounded "  width="80" height="80">
                
                {{-- 交換ボタン --}}
                <div>
                    <button type="button" class="btn btn-primary swap_button">交換する</button>
                    <button type="button" class="btn btn-outline-primary swap_button">お断りする</button>
                    
                </div>
            </div>
            
            
            
            
        </div>
        
    </div>
@endsection