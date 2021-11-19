@extends('layouts.app')


@section('content')
    <div >
            
            
            {{-- 見出し --}}
            <div class="border border-primary midasi text-center">
                @include('commons.back_button')
                <h2>
                    グッズ詳細
                </h2>
            </div>
            
            <div>
                <img src="{{ $exhibit->pic_id }}" width="200" height="200" >
                
                <table class="table table-striped table-sm goods_detail">
                    <tr><th>作品</th><td>{{ $exhibit->origin }}</td></tr>
                    <tr><th>グッズタイプ</th><td>{{ $exhibit->goods_type }}</td></tr>
                    <tr><th>キーワード</th><td>{{ $exhibit->keyword }}</td></tr>
                    <tr><th>キャラクター（譲）</th><td>{{ $exhibit->character }}</td></tr>
                    <tr><th>キャラクター（求）</th><td>{{ $exhibit->want_character }}</td></tr>
                </table>
            </div>

            <div class="shipping">
                <h2 class="border border-primary">
                    交換方法
                </h2>
            
                <div>
                    {{-- 交換情報 --}}
                    
                    <table class="table table-striped table-sm goods_detail">
                        <tr><th>郵送</th><td>{{ $mail_flag }}</td></tr>
                        <tr><th>手渡し</th><td>{{ $handing_flag }}</td></tr>
                        <tr><th>手渡し対応地域</th><td>{{ $exhibit->place }}</td></tr>
                        <tr><th>備考</th><td>{{ $exhibit->notes }}</td></tr>
                    </table>
                </div>
            </div>
            
            <div>
                {{-- 出品者のアイコン 
                <img src="{{ asset('storage/images/icon.png') }}" class="img-responsive img-rounded "  width="80" height="80">
                <img src="{{ asset( 'storage/'.$user->icon_id )}}" width="70" height="70" >
                --}}
               <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link">
                   <p>出品したユーザー：{{ $user->name }}</p>
               </a>
                
                @include('exhibits.requ_button')
                
            </div>
            
          
            
            
        
    </div>
@endsection