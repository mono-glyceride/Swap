@extends('layouts.app')

@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト詳細
    </h1>
</header>

<h2 class="border border-primary">
    あなたの出品したグッズ
</h2>
<div>
    <img src="{{ $exhibit->pic_id }}" width="200" height="200" >
</div>
<p class="tags">
    ＃{{ $exhibit->origin }}
    ＃{{ $exhibit->goods_type }}
    ＃{{ $exhibit->keyword }}
</p>

<h2 class="border border-primary">
    届いた交換リクエスト
</h2>

@if(count($propositions) > 0)
    @foreach($propositions as $proposition)
        <img src="{{$proposition->pic_id}}" width="200" height="200" >
            <table class="table table-striped table-sm goods_detail">
                <tr><th>状態</th><td>{{ $proposition->proposition_const('condition',$proposition->condition) }}</td></tr>
                
                @if($proposition->mail_flag == 1)
                <tr><th>交換方法</th><td>郵送</td></tr>
                <tr><th>発送元の地域</th><td>{{ $proposition->proposition_const('ship_from',$proposition->ship_from) }}</td></tr>
                <tr><th>発送までの日数</th><td>{{ $proposition->proposition_const('days',$proposition->days) }}</td></tr>
                @else
                <tr><th>交換方法</th><td>手渡し</td></tr>
                <tr><th>手渡し対応地域</th><td>{{ $proposition->place }}</td></tr>
                @endif
                <tr><th>備考</th><td>{{ $proposition->notes }}</td></tr>
            </table>
    @endforeach
@endif
@endsection