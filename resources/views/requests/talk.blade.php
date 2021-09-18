@extends('layouts.app')

@section('content')
    
    <div class="talk">
        
        
        
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary midasi">
                
                <h1>
                {{ $partner->name }}さんとのトーク画面
                
                
                </h1>
                
            </div>
        </div>
        
        <div class="talk">
            {{-- 表示している本人のコメントならmineクラス、相手のものならyoursクラスで生成 --}}
            
            
            @if ($receive_request->requester_id != $user->id) {
            <div class="yours">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ asset( 'storage/'.$receive_request->pic_id )}}" width="100" height="100" >
            </div>
            
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{ asset( 'storage/'.$exhibit->pic_id )}}" width="100" height="100" >
            </div>
            
            @else
            
            <div class="yours">
                {{-- 求めるグッズのサムネイル --}}
                <img src="{{ asset( 'storage/'.$exhibit->pic_id )}}" width="100" height="100" >
            </div>
            
            <div class="mine">
                {{-- 譲るグッズのサムネイル --}}
                <img src="{{ asset( 'storage/'.$receive_request->pic_id )}}" width="100" height="100" >
            </div>
            
            @endif
            
            
            
            @if (count($messages) > 0)      
                @foreach ($messages as $message)
                    @if (Auth::id() == $message->sender_id)
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
                    {{Form::hidden('sender_id',Auth::id())}}
                    {{Form::hidden('request_id',$receive_request->id)}}
                    {{ Form::label('message', 'message') }}<br>
                    {{Form::text('content', null, ['id' => 'message','class' => 'message_box'])}}
                    {!! Form::submit('送信', ['class' => 'btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        
@endsection