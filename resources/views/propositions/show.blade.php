@extends('layouts.app')

@section('content')
    <div >
        <div class="text-center">
            
            
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                    交換リクエスト詳細
                </h1>
            </div>
            
            <div class="goods_pair">
                <h2 class="border border-primary">
                    あなたが求めるグッズ
                </h2>
                <div>
                    {{-- グッズ画像 --}}
                    <img src="{{ $exhibit->pic_id }}" width="200" height="200" >
                </div>
                
                
            </div>
            
            <div class="goods_pair">
                <h2 class="border border-primary">
                    あなたが譲るグッズ
                </h2>
                
                @if($proposition->mail_flag == 1)
                <div>
                    {{-- グッズ画像 --}}
                    <img src="{{ $proposition->pic_id }}" width="200" height="200" >
                    <table class="table table-striped table-sm goods_detail">
                        <tr><th>状態</th><td>{{ $condition }}</td></tr>
                        <tr><th>交換方法</th><td>郵送</td></tr>
                        <tr><th>発送元の地域</th><td>{{ $ship_from }}</td></tr>
                        <tr><th>発送までの日数</th><td>{{ $days }}</td></tr>
                        <tr><th>備考</th><td>{{ $proposition->notes }}</td></tr>
                    </table>
                </div>
                @else
                
                <div>
                    {{-- グッズ画像 --}}
                    <img src="{{ $proposition->pic_id }}" width="200" height="200" >
                    <table class="table table-striped table-sm goods_detail">
                        <tr><th>状態</th><td>{{ $condition }}</td></tr>
                        <tr><th>交換方法</th><td>手渡し</td></tr>
                        <tr><th>手渡し対応地域</th><td>{{ $proposition->place }}</td></tr>
                        <tr><th>備考</th><td>{{ $proposition->notes }}</td></tr>
                    </table>
                </div>
                
                @endif
            </div>
            
           
            <div>
                {{-- 出品者のアイコン
                <h2 class="border border-primary">
                    リクエストユーザー
                </h2>
                <img src="{{ asset('storage/images/icon.png') }}" class="img-responsive img-rounded "  width="80" height="80"> --}}
                
                
                {{-- 削除ボタン --}}
                @if($proposition->status == 1)
                    {!! Form::model($proposition, ['route' => ['propositions.update', $proposition->id], 'method' => 'patch']) !!}
    　               {{Form::hidden('status','6')}}
                    {!! Form::submit('この交換リクエストを削除', ['class' => 'btn btn-danger btn-block requ_button']) !!}
                    {!! Form::close() !!}
                @elseif($proposition->status == 3)
                    この交換リクエストは成立しませんでした。
                @endif
                
            </div>
            
        </div>
        
    </div>
@endsection