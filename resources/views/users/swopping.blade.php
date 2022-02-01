@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            取引中一覧
    </h1>
</header>
<main class="select">
    @if (count($dealings) > 0)
        @foreach ($dealings as $proposition)
            @if($proposition->user->id === auth()->user()->id)
                <div class="proposition_card">
                    <table class="table goods_detail table-striped">
                        <tr><th>タグ</th><td>{{ $proposition->exhibit->categorize_tags(0) }}{{ $proposition->exhibit->categorize_tags(1) }}{{ $proposition->exhibit->categorize_tags(2) }}</td></tr>
                        <tr><th>開始日</th><td>{{ $proposition->day() }}</td></tr>
                        <tr><th>お相手</th><td>{{ $proposition->exhibit->user->name }}</td></tr>
                        <tr><th>貰う</th><td>{{ $proposition->exhibit->categorize_tags(3) }}</td></tr>
                        <tr><th>渡す</th><td>{{ $proposition->exhibit->categorize_tags(4) }}</td></tr>
                        <tr><th>取引方法</th><td>{{$proposition->shipping()}}</td></tr>
                    </table>
                    <a href="{{ route('propositions.talk', ['id' => $proposition->id]) }}" class="btn btn-block btn-primary">取引画面</a>
                </div>
            @else
                <div class="proposition_card">
                    <table class="table goods_detail table-striped">
                        <tr><th>タグ</th><td>{{ $proposition->exhibit->categorize_tags(0) }}{{ $proposition->exhibit->categorize_tags(1) }}{{ $proposition->exhibit->categorize_tags(2) }}</td></tr>
                        <tr><th>開始日</th><td>{{ $proposition->day() }}</td></tr>
                        <tr><th>お相手</th><td>{{ $proposition->user->name }}</td></tr>
                        <tr><th>貰う</th><td>{{ $proposition->exhibit->categorize_tags(4) }}</td></tr>
                        <tr><th>渡す</th><td>{{ $proposition->exhibit->categorize_tags(3) }}</td></tr>
                        <tr><th>取引方法</th><td>{{$proposition->shipping()}}</td></tr>
                    </table>
                    <a href="{{ route('propositions.talk', ['id' => $proposition->id]) }}" class="btn btn-block btn-primary">取引画面</a>
                </div>
            @endif
        @endforeach
    @endif
</main>
@include('commons.footer')
@endsection