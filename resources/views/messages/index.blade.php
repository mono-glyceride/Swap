@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            トーク一覧
    </h1>
</header>
<div class="message_index">
    @if (count($dealings) > 0)
        <div class="list-group">
            @foreach ($dealings as $dealing)
                <a href="{{ route('propositions.talk',['id'=>$dealing->id]) }}" class="list-group-item list-group-item-action">
                    <b>{{$dealing->partner($user->id)->name}}</b>
                    @if(is_null($dealing->latest_message()))
                    <p>まだメッセージはありません</p>
                    @else
                    <p>{{$dealing->latest_message()->content}}</p>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</div>
@include('commons.footer')
@endsection