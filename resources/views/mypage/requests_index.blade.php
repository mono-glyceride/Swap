@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>貰った交換リクエスト一覧</h1>
            </div>
            {{-- 交換リクエスト一覧 --}}
            @include('../commons.requests')
            
        </div>
        
        
    </div>
@endsection