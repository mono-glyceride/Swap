@extends('layouts.app')

@section('content')
<div class="talk">
    <header class="sticky-top d-block d-sm-none">
        <h1 class="d-flex align-items-center">
            @include('commons.back_button')
            {{$partner->name}}さんとの取引画面
        </h1>
    </header>
            @if(!$proposition->is_reviewed($partner->id))
            <div class="review_form">
            {{ Form::open(['route' => 'reviews.store']) }}
            {{Form::hidden('proposition_id',$proposition->id)}}
            {{Form::label('point','評価【必須】')}}
            {{Form::select('point', [1 => 'よかった', 0 => '残念だった'], 1, ['class' => 'form-control','id' => 'selectEvalute'])}}
            {{Form::label('comment','コメント【必須】')}}
            {{Form::textarea('comment', 'お取引ありがとうございました。', ['class' => 'form-control', 'id' => 'comment',  'rows' => '3'])}}
            {{ Form::submit('評価してこの取引を終了', ['class' => 'btn btn-info']) }}
            {{ Form::close() }}
            </div>
            @else
            ※既に相手ユーザーを評価済みです。
            @endif
            
            {{-- 表示している本人のコメントならmineクラス、相手のものならyoursクラスで生成 --}}
    
    <div class="messages">        
            @if ($proposition->user_id != $user->id) 
            <div class="your_img">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ $proposition->pic_id }}" width="100" height="100" >
            </div>
            <div class="my_img">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{ $exhibit->pic_id }}" width="100" height="100" >
            </div>
            @else
            
            <div class="your_img">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ $exhibit->pic_id }}" width="100" height="100" >
            </div>
            
            <div class="my_img">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{$proposition->pic_id }}" width="100" height="100" >
            </div>
            
            @endif
            
            
            
            @if (count($messages) > 0)      
                @foreach ($messages as $message)
                    @if (Auth::id() == $message->user_id)
                        <div class="mine">
                            <p class="my_comment our_comment">{{ $message->content }}</p>
                        </div>
                    @else
                        <div class="yours">
                            <p class="your_comment our_comment">{{ $message->content }}</p>
                        </div>
                    @endif    
                @endforeach
            @endif
        
        @if(!$proposition->is_reviewed($partner->id))
        <div class="talk_footer fixed-bottom">
            {{ Form::open(['route' => 'messages.store']) }}
                <div>
                    {{Form::hidden('user_id',Auth::id())}}
                    {{Form::hidden('proposition_id',$proposition->id)}}
                    <div class="row message_box">
                        {{Form::text('content', null, ['id' => 'message','class' => 'col-10 message_box','placeholder'=>'メッセージ'])}}
                        {!! Form::submit('➡', ['class' => 'btn-primary col-2']) !!}
                    </div>    
                </div>
            {!! Form::close() !!}
        </div>
        @else
        @include('commons.footer')
        @endif
    </div>    
</div>        
@endsection