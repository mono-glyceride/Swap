@extends('layouts.app')

@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト詳細（申請中）
    </h1>
</header>

<main class="select">
    <h2>
        出品されたグッズ
    </h2>

    <div class="proposition_card shadow-sm">
        <div class="row"> 
            <img src="{{$exhibit->pic_id}}" class="col-4" >
                <table class="table table-borderless goods_detail col-8">
                    <tr><th>タグ</th><td>{{$exhibit->categorize_tags(0)}}{{$exhibit->categorize_tags(1)}}{{$exhibit->categorize_tags(2)}}</td></tr>
                    <tr><th class="col-4">求</th><td>{{$exhibit->categorize_tags(3)}}</td></tr>
                    <tr><th class="col-4">譲</th><td>{{$exhibit->categorize_tags(4)}}</td></tr>
                    <tr><th class="col-4">備考</th><td>{{$exhibit->notes }}</td></tr>
                </table>
        </div>
    </div>
    
    <h2>
        あなたが送った交換リクエスト
    </h2>
    <div class="proposition_card">
        <div class="row"> 
            <img src="{{$proposition->pic_id}}" class="col-4" >
                <table class="table table-borderless goods_detail col-8">
                    <tr><th>状態</th><td>{{ $proposition->proposition_const('condition',$proposition->condition) }}</td></tr>
                
                    @if($proposition->mail_flag == 1)
                    <tr><th class="col-4">郵送</th><td>{{ $proposition->proposition_const('ship_from',$proposition->ship_from) }}</td></tr>
                    @else
                    <tr><th class="col-4">手渡し</th><td>{{ $proposition->place }}</td></tr>
                    @endif
                    <tr><th class="col-4">備考</th><td>{{ $proposition->notes }}</td></tr>
                </table>
        </div>
    </div>
</main>
@include('commons.footer')
@endsection