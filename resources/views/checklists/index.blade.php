@extends('layouts.app')


@section('content')
        <div class="text-center border border-primary midasi">
                <h1>
                    やることリスト
                </h1>
        </div>
        <ul>
        @if (count($checklists) > 0)      
                @foreach ($checklists as $checklist)
                        @if($checklist->content_id == 0)
                            <a href="{{ route('propositions.talk', ['id' => $checklist->proposition->id]) }}">
                                <figure>
                                <img src="{{$checklist->proposition->exhibit->pic_id }}" width="70" height="70" >
                                @if($checklist->proposition->mail_flag == 1)
                                    <figcaption>「{{$checklist->proposition->exhibit->character}} {{$checklist->proposition->exhibit->goods_type}}」
                                    への交換リクエストが成立しました。トーク画面から配送情報（住所など）の交換をお願いします</figcaption>
                                    </figure>
                                @else
                                <figcaption>「{{$checklist->proposition->exhibit->character}} {{$checklist->proposition->exhibit->goods_type}}」
                                    への交換リクエストが成立しました。トーク画面から交換場所や日時の話し合いをお願いします</figcaption>
                                    </figure>
                                @endif
                            </a>
                            {!! Form::model($checklist, ['route' => ['checklists.update',$checklist->id], 'method' => 'patch']) !!}
                                {{Form::hidden('status','0')}}
                                {!! Form::button('完了', ['class' => "btn btn-dark btn-sm", 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                            
        
                        @elseif($checklist->content_id == 1) 
                                {!! Form::model($checklist, ['route' => ['checklists.update',$checklist->id], 'method' => 'patch']) !!}
                                        {{Form::hidden('status','0')}}
                                        {!! Form::button('取引メッセージが届きました。返信をお願いします', ['class' => "btn btn-light", 'type' => 'submit']) !!}
                                {!! Form::close() !!}
                        @elseif($checklist->content_id == 3) 
                            <a href="{{ route('propositions.edit', ['proposition' => $checklist ->proposition->id]) }}">
                                <figure>
                                    <img src="{{$checklist->proposition->exhibit->pic_id }}" width="70" height="70" >
                                    <figcaption>
                                        交換リクエストが届きました。３日以内に返答をお願いします。
                                    </figcaption>
                                </figure>
                            </a>
                        @endif
                @endforeach
            @endif
        </ul>
@endsection