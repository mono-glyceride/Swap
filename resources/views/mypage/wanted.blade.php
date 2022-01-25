@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            @if($user->id === Auth::id())  
                あなたが出品中のグッズ
            @else
                {{$user->name}}さんが出品中のグッズ
            @endif
    </h1>
</header>
@include('../commons.exhibits')
@include('commons.footer')
@endsection