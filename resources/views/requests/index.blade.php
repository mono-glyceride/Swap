@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>交換リクエスト一覧</h1>
                
            </div>
            <div>
                
                
                
            </div>
            {{-- リクエスト一覧 --}}
            
@if (count($receive_requests) > 0)
<h2 class="requ">貰った交換リクエスト</h2>
<div class="exhibit_index">
        @foreach ($receive_requests as $receive_request)
                    <div class="col  d-block exhibit_item">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('requests.edit', ['request' => $receive_request ->id]) }}">
                        <img src="{{ $receive_request->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
                
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_requests->links() }}--}}
            
@endif
</div>
            
             
            <div>
                @if (count($requests) > 0)      
                <div>
                
                <h2 class="requ">送った交換リクエスト</h2>
                
            </div>
        @foreach ($requests as $request)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('requests.show', ['request' => $request ->id]) }}">
                        <img src="{{ $request->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_requests->links() }}--}}
            
@endif
            
            </div>
            
            <div>
                @if (count($reject_requests) > 0)      
                <div>
                
                <p>以下のリクエストは成立しませんでした</p>
                
            </div>
        @foreach ($reject_requests as $reject_request)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- 出品詳細ページへのリンク --}}
                        <img src="{{ $reject_request->pic_id }}" width="70" height="70" >
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_requests->links() }}--}}
            
@endif
            
            </div>
            
        </div>
        
        
    </div>
@endsection