@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>{{$keyword}}　の検索結果</h1>
            </div>
            {{-- 出品一覧 --}}
            @if($exhibits != null)
            @include('../commons.exhibits')
            @else
            <p>該当する出品はありませんでした。</p>
            @endif
        </div>
        
        
    </div>
@endsection