@extends('layouts.app')

@section('content')
    <main>
        <header class="sticky-top d-block d-sm-none">
            <h1 class="d-flex align-items-center">
                @include('commons.back_button')
                交換リクエストを入力（手渡し）
            </h1>
        </header>   
                    
        <div class="goods_form">
                {{ Form::open(['route' => 'propositions.store', 'files' => true]) }}
                
                    
                    {{Form::hidden('exhibit_id',$exhibit_id)}}
                    {{Form::hidden('handing_flag',1)}}
                    {{Form::hidden('mail_flag',2)}}
                    
                    <div class="form_items">    
                    {{ Form::label('pic', '画像　【必須】') }}
                    {{Form::file('pic_id', null, ['id' => 'pic'])}}
                    </div>
                    
                    <div class="form_items">
                    {{ Form::label('place', '手渡し対応地域 【必須】') }}
                    {{Form::text('place', null, ['id' => 'place'])}}
                    </div>
                    
                    <div class="form_items">
                    {{ Form::label('condition', '状態　【必須】') }}
                    {{Form::select('condition', [1 => '未開封', 2=> '確認のため開封',3=> 'その他',],  ['id' => 'condition'])}}
                    </div>
                    
                    <div class="form_items">
                    {{ Form::label('notes', '備考') }}
                    {{Form::text('notes', null, ['id' => 'notes'])}}
                    </div>
                    
            {{ Form::submit('交換リクエストを送信', ['class' => 'btn-block btn-primary']) }}
            {{ Form::close() }}
        </div>
    </main>
@include('commons.footer')
@endsection

