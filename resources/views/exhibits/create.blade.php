@extends('layouts.app')

@section('content')
{{-- 見出し --}}
{{ Form::open(['route' => 'exhibits.store', 'files' => true]) }}

<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        出品情報を入力
        {{ Form::submit('出品する', ['class' => 'btn']) }}
    </h1>
</header>

<div class="goods_form">
    
    <div class="form_items">
    <label for="pic">画像</label>
        <div class="file">
            ファイルを選択
            <input name="pic_id" type="file">
        </div>
    </div>
    
    <div class="form_items">
    {{ Form::label('origin', '作品')}}
    {{Form::text('origin', null, ['id' => 'origin','placeholder'=>'必須',])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('keyword', 'タグ') }}
    {{Form::text('keyword', null, ['id' => 'keyword'])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('goods_type', 'グッズタイプ') }}
    {{Form::text('goods_type', null, ['id' => 'goods_type'])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('character', '【譲】キャラクター') }}
    {{Form::text('character', null, ['id' => 'character','placeholder'=>'必須'])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('want_character', '【求】キャラクター') }}
    {{Form::text('want_character', null, ['id' => 'want_character','placeholder'=>'必須'])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('shipping', '交換方法') }}
    {{Form::select('shipping', ['1' => '郵送のみ', '2' => '手渡しのみ', '3' => '郵送or手渡し'], '1')}}
    </div>
    
    <div class="form_items">
    {{ Form::label('place', '手渡し対応地域') }}
    {{Form::text('place', null, ['id' => 'place'])}}
    </div>
    
    <div class="form_items">
    {{ Form::label('notes', '補足説明') }}
    {{Form::textarea('notes', null, ['id' => 'notes'])}}
    </div>
                    
</div>

{{ Form::close() }}
@endsection