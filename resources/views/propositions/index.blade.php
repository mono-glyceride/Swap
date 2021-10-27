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
            
@if (count($receive_propositions) > 0)
<h2 class="requ">貰った交換リクエスト</h2>
<div class="exhibit_index">
        @foreach ($receive_propositions as $receive_proposition)
                    <div class="col  d-block exhibit_item">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('propositions.edit', ['proposition' => $receive_proposition ->id]) }}">
                        <img src="{{ $receive_proposition->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
                
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_propositions->links() }}--}}
            
@endif
</div>
            
             
            <div>
                @if (count($propositions) > 0)      
                <div>
                
                <h2 class="requ">送った交換リクエスト</h2>
                
            </div>
        @foreach ($propositions as $proposition)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('propositions.show', ['proposition' => $proposition ->id]) }}">
                        <img src="{{ $proposition->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_propositions->links() }}--}}
            
@endif
            
            </div>
            
            <div>
                @if (count($reject_propositions) > 0)      
                <div>
                
                <p>以下のリクエストは成立しませんでした</p>
                
            </div>
        @foreach ($reject_propositions as $reject_proposition)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- 出品詳細ページへのリンク --}}
                        <img src="{{ $reject_proposition->pic_id }}" width="70" height="70" >
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_propositions->links() }}--}}
            
@endif
            
            </div>
            
        </div>
        
        
    </div>
@endsection