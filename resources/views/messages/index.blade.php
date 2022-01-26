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
        @foreach ($dealings as $array)
            @foreach ($array as $dealing)
                <a href="{{ route('propositions.talk',['id'=>$dealing->id]) }}" class="list-group-item list-group-item-action">
                    <b>{{$dealing->latest_message($user->id)->user->name}}</b>
                    <p>{{$dealing->latest_message($user->id)->content}}</p>
                </a>
            @endforeach
        @endforeach
    </div>
    @endif
</div>
@include('commons.footer')
@endsection