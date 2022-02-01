@extends('layouts.app')

@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            詳細検索
    </h1>
</header>

<main class="explore">
    {{ Form::open(['route' => 'exhibits.search', 'class' => 'search_bar', 'method' => 'get']) }}
    
        <div class="form_items">
        {{ Form::label('character', '譲るキャラ') }}
        {{Form::search('character', null, ['id' => 'character','class' => 'form-control rounded-pill ','placeholder'=>''])}}
        </div>
        
        <div class="form_items">
        {{ Form::label('want_character', '求めるキャラ') }}
        {{Form::search('want_character', null, ['id' => 'want_character','class' => 'form-control rounded-pill ','placeholder'=>''])}}
        </div>
        
        <div class="form_items">
        {{ Form::label('keyword', 'キーワード') }}
        {{Form::search('keyword', null, ['id' => 'keyword','class' => 'form-control rounded-pill ','placeholder'=>'例：一番くじ　缶バッジ　カフェ'])}}
        </div>
        
        <div class="form_items">
        {{ Form::submit('検索', ['class' => 'btn-primary btn']) }}
        </div>
    
    {{ Form::close() }}
</main>
@include('commons.footer')
@endsection