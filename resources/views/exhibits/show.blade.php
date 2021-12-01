@extends('layouts.appsimple')


@section('content')
    <div >
            
            
            {{-- 見出し --}}
            <div class="header">
                <h1>
                    @include('commons.back_button')
                    グッズ詳細
                </h1>
            </div>
            
            <div>
                <img src="{{ $exhibit->pic_id }}">
                <div>
                    <p>{{ $exhibit->origin }}{{ $exhibit->goods_type }}{{ $exhibit->keyword }}</p>
                </div>
                <table class="table table-sm ">
                    <tr><th>キャラクター（譲）</th><td>{{ $exhibit->character }}</td></tr>
                    <tr><th>キャラクター（求）</th><td>{{ $exhibit->want_character }}</td></tr>
                    <tr><th>交換方法</th></th><td>{{ $mail_flag }}/{{ $handing_flag }}</td></tr>
                    <tr><th>手渡し対応地域</th><td>{{ $exhibit->place }}</td></tr>
                    <tr><th>補足説明</th><td>{{ $exhibit->notes }}</td></tr>
                </table>
            </div>
            
            <div>
                {{-- 出品者のアイコン 
                <img src="{{ asset('storage/images/icon.png') }}" class="img-responsive img-rounded "  width="80" height="80">
                <img src="{{ asset( 'storage/'.$user->icon_id )}}" width="70" height="70" >
                --}}
                <p>出品したユーザー</p>
                @include('users.info')
                @include('exhibits.requ_button')
                
            </div>
            
          
            
            
        
    </div>
@endsection