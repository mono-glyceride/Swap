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
                    あなたが貰うグッズ
                </h2>
                
               
                
                @if($mail_flag == 1)
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
                    <img src="{{$proposition->pic_id }}" width="200" height="200" >
                    <table class="table table-striped table-sm goods_detail">
                        <tr><th>状態</th><td>{{ $condition }}</td></tr>
                        <tr><th>交換方法</th><td>手渡し</td></tr>
                        <tr><th>手渡し対応地域</th><td>{{ $proposition->place }}</td></tr>
                        <tr><th>備考</th><td>{{ $proposition->notes }}</td></tr>
                    </table>
                </div>
                
                @endif
                
                
            </div>
            
            <div class="goods_pair">
                <h2 class="border border-primary">
                    あなたが譲るグッズ
                </h2>
            
                <div>
                    {{-- グッズ画像 --}}
                    <img src="{{ $exhibit->pic_id }}" width="200" height="200" >
                </div>
            </div>
            
           
            <div>
                <h2 class="border border-primary">
                    リクエストユーザー:{{$proposition->user->name}}
                </h2>
                
                
                {{-- 交換ボタン --}}
                    <div class="repry_btn">
                     
                        <div class="repry_item">
                        {!! Form::model($proposition, ['route' => ['propositions.update', $proposition->id], 'method' => 'patch']) !!}
                            {{Form::hidden('status','2')}}
                            {!! Form::submit('交換する', ['class' => 'btn btn-primary swap_button']) !!}
                        {!! Form::close() !!}
                        </div>
                        
                        <div class="repry_item">
                        {!! Form::model($proposition, ['route' => ['propositions.update', $proposition->id], 'method' => 'patch']) !!}
                            {{Form::hidden('status','3')}}
                            {!! Form::submit('お断りする', ['class' => 'btn btn-outline-primary swap_button']) !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
            </div>
            
            
            
            
        </div>
        
    </div>
@endsection