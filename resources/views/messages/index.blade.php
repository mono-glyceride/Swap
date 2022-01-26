@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            トーク一覧
    </h1>
</header>
<div class="lists">
    @if (count($dealings) > 0)      
        @foreach ($dealings as $array)
            @foreach ($array as $dealing)
            {{$dealing->latest_message($user->id)->user->name}}
            {{$dealing->latest_message($user->id)->content}}
            @endforeach
        @endforeach
    @endif
</div>
@include('commons.footer')
@endsection