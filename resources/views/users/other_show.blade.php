@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            
            
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                    {{$user->name}}さんのユーザーページ
                </h1>
            </div>
            
            {{-- <div class="f-item  d-block">
        <img src="{{ asset( 'storage/'.$user->icon_id )}}" width="70" height="70" >--}}
<div>
    
    <table class="table table-sm">
        <tr>    <th>年齢</th> <td>{{ $age }}</td>
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
            <a href="{{ route('exhibits.wanted', ['id' => $user->id]) }}" class="list-group-item list-group-item-action">出品中一覧</a>
            <a href="{{ route('reviews.index', ['id' => $user->id]) }}" class="list-group-item list-group-item-action">評価一覧</a>
        </div>
       
            
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">利用規約</a>
            <a href="#" class="list-group-item list-group-item-action">プライバシーポリシー</a>
        </div>
        
    </div>
@endsection