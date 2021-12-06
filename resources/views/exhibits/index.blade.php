@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

            @include('exhibits.exhibit_button')
            {{-- 出品一覧 --}}
            @include('../commons.exhibits')
            
        </div>
        
        
    </div>
@endsection