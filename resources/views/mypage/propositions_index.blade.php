@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
            </div>
            {{-- 交換リクエスト一覧 --}}
            @include('../commons.propositions')
            
        </div>
        
        
    </div>
@endsection