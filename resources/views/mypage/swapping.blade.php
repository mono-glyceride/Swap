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
            @if (count($receive_propositions) > 0)      
                @foreach ($receive_propositions as $receive_proposition)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                {{-- メッセージページへのリンク --}}
                                <a href="{{ route('propositions.talk', ['id' => $receive_proposition ->id]) }}">
                                <img src="{{ $receive_proposition->pic_id }}" width="70" height="70" >
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    {!! link_to_route('propositions.talk','トークルームへ', ['id' => $receive_proposition ->id]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            @endif
           
            
                     {{-- 取引中のグッズ（相手が出品者のもの） --}}
            @if (count($propositions) > 0)      
                @foreach ($propositions as $proposition)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                {{-- メッセージページへのリンク --}}
                                <a href="{{ route('propositions.talk', ['id' => $proposition ->id]) }}">
                                <img src="{{$proposition->exhibit->pic_id }}" width="70" height="70" >
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    {!! link_to_route('propositions.talk','トークルームへ', ['id' => $proposition ->id]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
            @endif
            </div>
            
            
            
            <div class="swapping">            {{-- 取引中のグッズ（自分が出品者のもの） --}}
            @if (count($finished_receive_propositions) > 0) 
            <p>
                ※以下の取引は終了しました。
            </p>
                @foreach ($finished_receive_propositions as $finished_receive_proposition)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <img src="{{ $finished_receive_proposition->pic_id }}" width="70" height="70" >
                            </div>
                            
                        </div>
                    </div>
                
                @endforeach
            @endif
            
                     {{-- 取引中のグッズ（相手が出品者のもの） --}}
            @if (count($finished_propositions) > 0)     
            <p>
                ※以下の取引は終了しました。
            </p>
                @foreach ($finished_propositions as $finished_proposition)
                    <div class="card mb-3 swapping_item" style="width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                {{-- メッセージページへのリンク --}}
                                <img src="{{$finished_proposition->exhibit->pic_id }}" width="70" height="70" >
                            </div>
                        </div>
                    </div>
                    @endforeach
            @endif
            
    </div>
@endsection
