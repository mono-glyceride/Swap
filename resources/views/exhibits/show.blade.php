@extends('layouts.app')


@section('content')
            {{-- 見出し --}}
            <header class="sticky-top d-block d-sm-none">
                <h1 class="d-flex align-items-center">
                    @include('commons.back_button')
                    グッズ詳細
                </h1>
            </header>
            
            <div class="row">
                <div class="imgs col-sm-6">
                    <img src="{{ $exhibit->pic_id }}" class="show_imgs">
                </div>
                <div class="col-sm-6">
                    <p class="tags">＃{{ $exhibit->origin }}
                    @if(isset($exhibit->goods_type))＃{{ $exhibit->goods_type }}@endif
                    @if( 0 < count($exhibit->tags))
                    @foreach($tags as $tag)
                    ＃{{ $tag->keyword }}
                    @endforeach
                    @endif
                    </p>
                    <table class="table table-sm item_table">
                        <tr><th>キャラクター（譲）</th><td>{{ $exhibit->character }}</td></tr>
                        <tr><th>キャラクター（求）</th><td>{{ $exhibit->want_character }}</td></tr>
                        <tr><th>交換方法</th></th><td>郵送に{{ $mail_flag }}/手渡しに{{ $handing_flag }}</td></tr>
                        <tr><th>手渡し対応地域</th><td>{{ $exhibit->place }}</td></tr>
                        <tr><th>補足説明</th><td>{{ $exhibit->notes }}</td></tr>
                    </table>
                    <div class="user">
                        <p>出品したユーザー</p>
                        @include('users.info')
                    </div>
                </div>
            </div>
            
            <footer class="fixed-bottom ">
            @include('exhibits.requ_button')
            </footer>
            
@endsection