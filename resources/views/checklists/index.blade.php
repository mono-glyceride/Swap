@extends('layouts.app')


@section('content')
<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            ToDoリスト
    </h1>
</header>
<div class="lists">
    @if (count($checklists) > 0)      
        @foreach ($checklists as $checklist)
            @if($checklist->content_id == 0)
                <a href="{{ route('propositions.talk', ['id' => $checklist->proposition->id]) }}">
                    <div class="row align-items-center d-flex">
                        <div class="col-3">
                            <img src="{{$checklist->proposition->exhibit->pic_id }}">
                        </div>
                        <div class="col-9">
                            <p>
                                @if($checklist->proposition->mail_flag == 1)
                                    「{{$checklist->proposition->exhibit->character}} {{$checklist->proposition->exhibit->goods_type}}」
                                    への交換リクエストが成立しました。トーク画面から配送情報（住所など）の交換をお願いします。
                                @else
                                    「{{$checklist->proposition->exhibit->character}} {{$checklist->proposition->exhibit->goods_type}}」
                                    への交換リクエストが成立しました。トーク画面から交換場所や日時の話し合いをお願いします。
                                @endif
                            </p>
                        </div>
                    </div>
                </a>
                            {{--
                            {{ Form::open(['route' => ['checklists.destroy',$checklist->id],'method' => 'delete','class'=>'form-horizontal']) }}
                                <p><button type="submit" class="btn btn-dark">完了</button></p>
                            {{ Form::close() }}
                            --}}
                            
            @elseif($checklist->content_id == 1) 
                <div class="row align-items-center d-flex">
                    <div class="col-3">
                    </div>
                    <div class="col-9">
                        {{ Form::open(['route' => ['checklists.destroy',$checklist->id],'method' => 'delete','class'=>'form-horizontal']) }}
                        {{Form::submit('取引メッセージが届きました。')}}
                        {{ Form::close() }}
                    </div>
                </div>
                                
            @elseif($checklist->content_id == 3) 
                <a href="{{ route('propositions.edit', ['proposition' => $checklist ->proposition->id]) }}">
                    <div class="row align-items-center d-flex">
                        <div class="col-3">
                            <img src="{{$checklist->proposition->exhibit->pic_id }}" width="70" height="70" >
                        </div>
                        <div class="col-9">
                            交換リクエストが届きました。３日以内に返答をお願いします。
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    @endif
</div>
@include('commons.footer')
@endsection