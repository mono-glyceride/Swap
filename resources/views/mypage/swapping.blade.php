@extends('layouts.app')


@section('content')
    <div >
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>
                    取引中のグッズ</h1>
            </div>
            
            
            <div class="swapping">            {{-- 取引中のグッズ（自分が出品者のもの） --}}
            @if (count($receive_requests) > 0)      
                @foreach ($receive_requests as $receive_request)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                {{-- メッセージページへのリンク --}}
                                <a href="{{ route('requests.talk', ['id' => $receive_request ->id]) }}">
                                <img src="{{ asset( 'storage/'.$receive_request->pic_id )}}" width="70" height="70" >
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    {!! link_to_route('requests.talk','トークルームへ', ['id' => $receive_request ->id]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            @endif
           
            
                     {{-- 取引中のグッズ（相手が出品者のもの） --}}
            @if (count($requests) > 0)      
                @foreach ($requests as $request)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                {{-- メッセージページへのリンク --}}
                                <a href="{{ route('requests.talk', ['id' => $request ->id]) }}">
                                <img src="{{ asset( 'storage/'.$request->exhibit->pic_id )}}" width="70" height="70" >
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    {!! link_to_route('requests.talk','トークルームへ', ['id' => $request ->id]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            @endif
            </div>
            
            
            
    
        
        
    </div>
@endsection