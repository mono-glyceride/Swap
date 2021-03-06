@extends('layouts.app')


@section('content')
    <header class="row">
        {{ Form::open(['route' => 'exhibits.quickfind', 'class' => 'col-10 search_bar d-flex align-items-center', 'method' => 'get']) }}
        {{Form::search('keyword', null, ['id' => 'keyword','class' => 'form-control rounded-pill ','placeholder'=>'グッズ検索'])}}
        {{--{{ Form::submit('検索', ['class' => 'btn btn-light']) }}--}}
        {{ Form::close() }}
        @auth
        <div class="col-2 check_icon d-flex align-items-center">
                <a href="{{ route('checklists.index') }}">
                    <i class="fas fa-check fa-lg">{{ auth()->user() ->count_checklists() }}</i>
                </a>
        </div>
        @endauth
    </header>
    <h2 class="d-flex align-items-center">
        @include('commons.back_button')
            @if(!is_null($character))
            譲:{{$character}}
            @endif
            @if(!is_null($want_character))
            求:{{$want_character}}
            @endif
            @if(!is_null($keyword))
            {{$keyword}}
            @endif
            の検索結果
    </h2>
    @if($exhibits != null)
        @include('../commons.exhibits')
    @else
        <p>該当する出品はありませんでした。</p>
    @endif
    @include('exhibits.exhibit_button')
        
    @if (Auth::check())
        @include('commons.footer')
    @else
        <footer class="basic-footer fixed-bottom row text-center d-flex align-items-center"> 
            <span class="col">
                <a class="btn btn-primary" href="{{ route('login') }}" role="button">ログイン</a>
            </span>
            <span class="col">
                <a class="btn btn-primary" href="{{ route('signup.get') }}" role="button">新規登録</a>
            </span>
        </footer>
    @endif
@endsection