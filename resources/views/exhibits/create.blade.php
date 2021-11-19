@extends('layouts.app')

@section('content')
    <div class="exhibit_form">
        <div class="text-center">
            {{-- 見出し --}}
            <div class="border border-primary simple_header">
                
                <h2 sticky-top>
                    出品情報を入力
                </h2>
                
            </div>
        </div>    
        <div class="exhibit_form">
            {{ Form::open(['route' => 'exhibits.store', 'files' => true]) }}
        
            {{ Form::label('origin', '作品 【必須】') }}
            {{Form::text('origin', null, ['id' => 'origin'])}}
        
            {{ Form::label('keyword', 'キーワード') }}
            {{Form::text('keyword', null, ['id' => 'keyword'])}}
        
            {{ Form::label('goods_type', 'グッズタイプ') }}
            {{Form::text('goods_type', null, ['id' => 'goods_type'])}}
            
            {{ Form::label('character', '【譲】キャラクター　【必須】') }}
            {{Form::text('character', null, ['id' => 'character'])}}
            
            
            {{ Form::label('pic', '画像 【必須】') }}
            {{Form::file('pic_id', null, ['id' => 'pic'])}}
            
            {{ Form::label('want_character', '【求】キャラクター【必須】') }}
            {{Form::text('want_character', null, ['id' => 'want_character'])}}
            
            
        </div>
        
        <h2 class="border border-primary">
        　交換方法            
        </h2>       
            <div class="exhibit_form">
                    
                    {{ Form::label('shipping', '郵送') }}
                    {{ Form::radio('shipping', 1, true,['class' => 'radio-button__input']) }}
                    
                    {{ Form::label('shipping', '手渡し') }}
                    {{ Form::radio('shipping', 2, false,['class' => 'radio-button__input']) }}
                    
                    {{ Form::label('shipping', '郵送＋手渡し') }}
                    {{ Form::radio('shipping', 3, false,['class' => 'radio-button__input']) }}
                
                    {{ Form::label('place', '手渡し対応地域') }}
                    {{Form::text('place', null, ['id' => 'place'])}}
                    
                    {{ Form::label('notes', '備考') }}
                    {{Form::text('notes', null, ['id' => 'notes'])}}
                
                    
            </div>   
            {{ Form::submit('出品', ['class' => 'btn-block btn-primary']) }}
            {{ Form::close() }}
	
</div>
        
        
    </div>
@endsection

<style>


.exhibit_form h2{
    width: 100%; 
    
}

.exhibit_form form{
    display: grid; 
    
}

.exhibit_form div{
    display: grid; 
    
}

.form-group {
    display: grid; 
    
}

.exhibit_form label{
    grid-column: 1;
    
}

.exhibit_form input{
    grid-column: 2;
    margin-bottom:1em;
    margin-top:1em;
    
}

.exhibit_form serect{
    grid-column: 2;
    
}

.exhibit_form div{
    margin-bottom:2em;
}

</style>