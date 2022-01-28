@extends('layouts.app')

@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト詳細
    </h1>
</header>

<h2 class="border border-primary">
    あなたの出品したグッズ
</h2>
    
<div>
    <img src="{{ $exhibit->pic_id }}" width="200" height="200" >
</div>

<h2 class="border border-primary">
    届いた交換リクエスト
</h2>

@if(count($propositions) > 0)
    @foreach($propositions as $proposition)
        <img src="{{$proposition->pic_id}}" width="200" height="200" >
    @endforeach
@endif
@endsection