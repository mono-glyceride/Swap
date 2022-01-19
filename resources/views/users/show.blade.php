@extends('layouts.app')


@section('content')
<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        マイページ
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
            <a href="{{ route('users.edit', ['user' => Auth::id()]) }}" class="list-group-item list-group-item-action">プロフィール編集</a>
            <a href="{{ route('propositions.index') }}" class="list-group-item list-group-item-action">交換リクエスト</a>
            <a href="{{ route('propositions.swapping', ['id' => Auth::id()])}}" class="list-group-item list-group-item-action">取引中一覧</a>
            <a href="{{ route('exhibits.wanted', ['id' => Auth::id()]) }}" class="list-group-item list-group-item-action">出品中一覧</a>
            <a href="{{ route('reviews.index', ['id' => Auth::id()]) }}" class="list-group-item list-group-item-action">評価一覧</a>
            <a class="list-group-item-action list-group-item" href="https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id={{$lineSetting->getLoginChannelId() }}&redirect_uri={{ $encodedBaseUrl }}&state={{ csrf_token() }}&scope=openid">LINEログインする</a>
            <a href="{{ route('logout.get') }}"class="list-group-item list-group-item-action">ログアウト</a>
    </div>
       
            
    <div class="list-group">
        <a href="" class="list-group-item list-group-item-action">利用規約</a>
        <a href="" class="list-group-item list-group-item-action">プライバシーポリシー</a>
    </div>
    
    @include('commons.footer')
    
</main>
@endsection