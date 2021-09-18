@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                    お迎え募集中のグッズ</h1>
                
                
            </div>
            {{-- 出品一覧 --}}
            @include('../commons.exhibits')
            
        </div>
        
        
    </div>
@endsection