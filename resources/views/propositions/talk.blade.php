@extends('layouts.app')

@section('content')
    
    <div class="talk">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                <h1>
                {{$partner->name}}さんとの取引画面
                </h1>
            </div>
            
            
            {{ Form::open(['route' => 'reviews.store']) }}
            {{-- {{Form::hidden('status',4)}} --}}
            {{Form::hidden('proposition_id',$proposition->id)}}
            <label class="radio-button">
                {{ Form::radio('point', 1, true,['class' => 'radio-button__input']) }}
                <span class="radio-button__icon">よかった</span>
            </label>
            <label class="radio-button">
                {{ Form::radio('point', 0, false,['class' => 'radio-button__input']) }}
                <span class="radio-button__icon">残念だった</span>
            </label>
            {{Form::textarea('comment', 'お取引ありがとうございました。', ['class' => 'form-control', 'id' => 'comment',  'rows' => '3'])}}
            {{ Form::submit('評価してこの取引を終了', ['class' => 'btn btn-info']) }}
            {{ Form::close() }}
            
        </div>
        
        <div class="talk">
            {{-- 表示している本人のコメントならmineクラス、相手のものならyoursクラスで生成 --}}
            
            @if ($proposition->user_id != $user->id) 
            <div class="yours">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ $proposition->pic_id }}" width="100" height="100" >
            </div>
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{ $exhibit->pic_id }}" width="100" height="100" >
            </div>
            @else
            
            <div class="yours">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ $exhibit->pic_id }}" width="100" height="100" >
            </div>
            
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{$proposition->pic_id }}" width="100" height="100" >
            </div>
            
            @endif
            
            
            
            @if (count($messages) > 0)      
                @foreach ($messages as $message)
                    @if (Auth::id() == $message->user_id)
                        <div class="mine">
                            {{-- 出品詳細ページへのリンク --}}
                            <p class="my_comment">{{ $message->content }}</p>
                        </div>
                    @else
                        <div class="yours">
                            {{-- 出品詳細ページへのリンク --}}
                            <p class="your_comment">{{ $message->content }}</p>
                        </div>
                    @endif    
                @endforeach
            @endif
            
        </div>
        
        <div class="talk_footer">
            {!! Form::open(['route' => 'messages.store']) !!}
                <div>
                    {{Form::hidden('user_id',Auth::id())}}
                    {{Form::hidden('proposition_id',$proposition->id)}}
                    {{ Form::label('message', 'message') }}<br>
                    {{Form::text('content', null, ['id' => 'message','class' => 'message_box'])}}
                    {!! Form::submit('送信', ['class' => 'btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        
@endsection