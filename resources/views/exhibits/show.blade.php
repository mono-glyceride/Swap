@extends('layouts.appsimple')


@section('content')
            {{-- 見出し --}}
            <header class="sticky-top d-block d-sm-none">
                <h1>
                    @include('commons.back_button')
                    グッズ詳細
                </h1>
            </header>
            
            <div class="row">
                <div class="imgs col-sm-6">
                    <img src="{{ $exhibit->pic_id }}">
                </div>
                <div class="col-sm-6">
                    <p class="tags">
                    　＃{{ $exhibit->origin }}
                    　＃{{ $exhibit->goods_type }}
                    　＃{{ $exhibit->keyword }}
                    </p>
                    <table class="table table-sm ">
                        <tr><th>キャラクター（譲）</th><td>{{ $exhibit->character }}</td></tr>
                        <tr><th>キャラクター（求）</th><td>{{ $exhibit->want_character }}</td></tr>
                        <tr><th>交換方法</th></th><td>{{ $mail_flag }}/{{ $handing_flag }}</td></tr>
                        <tr><th>手渡し対応地域</th><td>{{ $exhibit->place }}</td></tr>
                        <tr><th>補足説明</th><td>{{ $exhibit->notes }}</td></tr>
                    </table>
                    <div class="user">
                        <p>出品したユーザー</p>
                        @include('users.info')
                    </div>
                </div>
            </div>
            
            <footer class="fixed-bottom">
            @include('exhibits.requ_button')
            </footer>
@endsection