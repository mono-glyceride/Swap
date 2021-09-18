@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>
                    あなたが出品中のグッズ</h1>
            </div>
            {{-- 出品一覧 --}}
            @include('../commons.exhibits')
            
        </div>
        
        
    </div>
@endsection