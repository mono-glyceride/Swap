@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                @if($user->id === Auth::id())  
                <h1>あなたが出品中のグッズ</h1>
                @else
                <h1>{{$user->name}}さんが出品中のグッズ</h1>
                @endif
            </div>
            {{-- 出品一覧 --}}
            @include('../commons.exhibits')
            
        </div>
        
        
    </div>
@include('commons.footer')
@endsection