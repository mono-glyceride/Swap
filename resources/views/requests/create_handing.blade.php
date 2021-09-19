@extends('layouts.app')

@section('content')
    <div class="exhibit_form">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary simple_header">
                
                <h2 sticky-top>
                    交換リクエストを入力
                </h2>
                
            </div>
        </div>    
                    
            <div class="exhibit_form">
                {!! Form::open(['route' => 'requests.store', 'files' => true]) !!}
                
                    
                    {{Form::hidden('exhibit_id',$exhibit_id)}}
                    {{Form::hidden('handing_flag',1)}}
                    {{Form::hidden('mail_flag',2)}}
                        
                    {!! Form::label('pic', '画像　【必須】') !!}
                    {{Form::file('pic_id', null, ['id' => 'pic'])}}
                    
                    {!! Form::label('place', '手渡し対応地域 【必須】') !!}
                    {{Form::text('place', null, ['id' => 'place'])}}
                    
                    {!! Form::label('condition', '状態　【必須】') !!}
                    {{Form::select('condition', [1 => '未開封', 2=> '確認のため開封',3=> 'その他',],  ['id' => 'condition'])}}
                
                
                    {!! Form::label('notes', '備考') !!}
                    {{Form::text('notes', null, ['id' => 'notes'])}}
            </div>    
                
            {!! Form::submit('交換リクエストを送信', ['class' => 'btn-block btn-primary']) !!}
            {!! Form::close() !!}
        
            
    
        
        
    </div>
@endsection

