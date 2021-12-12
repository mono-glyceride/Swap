@extends('layouts.app')


@section('content')
<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        {{$user->name}}さんのユーザーページ
    </h1>
</header>
    
<main>
    <div class="row user_info">
        <div class="icon col-3 border">
        </div>
        <div class="col-9">
            <div class="font-weight-bold">
            <p><b>{{ $user->name }}</b>
            <br>{{$user->review_avarage()}}</p>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            </div>
            
            <div>
                {{ $prefecture }}　{{ $age }}　{{ $gender }}
            </div>
            
        </div>
    </div>
    
    <div class="introduce">
            <p class="mb-0 text-left">
                {!! nl2br(e($user->introduce)) !!}
            </p>
    </div>
        
        <div class="list-group d-black d-md-none">
            <a href="{{ route('exhibits.wanted', ['id' => $user->id]) }}" class="list-group-item list-group-item-action">出品中一覧</a>
            <a href="{{ route('reviews.index', ['id' => $user->id]) }}" class="list-group-item list-group-item-action">評価一覧</a>
        </div>
        
        <div class="list-group">
            <a href="" class="list-group-item list-group-item-action">利用規約</a>
            <a href="" class="list-group-item list-group-item-action">プライバシーポリシー</a>
        </div>
        
    </div>
@endsection