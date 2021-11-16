@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            
            
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                    マイページ
                </h1>
            </div>
            
            {{-- <div class="f-item  d-block">
        <img src="{{ asset( 'storage/'.$user->icon_id )}}" width="70" height="70" >--}}
<div>
    
    <table class="table table-sm">
        <tr>    <th>名前</th> <td>{{ $user->name }}</td>
                <th>年齢</th> <td>{{ $age }}</td>
                <th>地域</th> <td>{{ $prefecture }}</td>
                <th>性別</th> <td>{{ $gender }}</td>
        </tr>        
    </table>
    
            
        </div>
        
        {{-- 自己紹介 --}}
        
        <p class="text-left">【自己紹介】</p>
        <div class="border border-primary introduce">
            <p>
            <p class="mb-0 text-left">{!! nl2br(e($user->introduce)) !!}</p>
            </p>
        </div>
        
        
        <div class="list-group d-black d-md-none">
            <a href="{{ route('users.edit', ['user' => Auth::id()]) }}" class="list-group-item list-group-item-action">プロフィール編集</a>
            <a href="{{ route('propositions.index') }}" class="list-group-item list-group-item-action">交換リクエスト</a>
            <a href="{{ route('propositions.swapping', ['id' => Auth::id()])}}" class="list-group-item list-group-item-action">取引中一覧</a>
            <a href="{{ route('exhibits.wanted', ['id' => Auth::id()]) }}" class="list-group-item list-group-item-action">出品中一覧</a>
            <a href="{{ route('reviews.index', ['id' => Auth::id()]) }}" class="list-group-item list-group-item-action">評価一覧</a>
        </div>
       
            
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">利用規約</a>
            <a href="#" class="list-group-item list-group-item-action">プライバシーポリシー</a>
        </div>
        
    </div>
@endsection