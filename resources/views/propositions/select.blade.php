@extends('layouts.app')

@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト詳細（回答保留中）
    </h1>
</header>

<main class="select">
    <h2>
        あなたの出品したグッズ
    </h2>
    <a href="{{ route('exhibits.show', ['exhibit' => $exhibit->id])}}">
    <div class="proposition_card row shadow-sm">
        <img src="{{ $exhibit->pic_id }}"  class="col-4" >
        <p class="col-8">
            {{$exhibit->categorize_tags(0)}}{{$exhibit->categorize_tags(1)}}{{$exhibit->categorize_tags(2)}}
        </p>
    </div>
    </a>

    <h2>
        届いた交換リクエスト
    </h2>

    @if(count($propositions) > 0)
        @foreach($propositions as $proposition)
    <div class="proposition_card">
        <a href="{{ route('users.show', ['user' => $proposition->user->id]) }}">
            <div class="row proposition_user">
                <div class="icon col-4">
                </div>
                    <div class="col-8">
                        <p><b>{{ $proposition->user->name }}</b>
                                @if($proposition->user->reviewers->isEmpty())
                                    <br>評価はまだありません。
                                @else
                                    <br>評価：{{$proposition->user->review_avarage()}} / 5.0 （{{count($proposition->user->reviewers)}}件）</p>
                                @endif
                                {{ $proposition->user->user_const('prefecture' ,$proposition->user->prefecture) }}　
                                /{{ $proposition->user->user_const('age' ,$proposition->user->age) }}　
                                /{{ $proposition->user->user_const('gender' ,$proposition->user->gender) }}
                        </p>
                </div>
        </div>
        </a>
    <div class="row"> 
        <img src="{{$proposition->pic_id}}" class="col-4" >
            <table class="table table-borderless goods_detail col-8">
                <tr><th>状態</th><td>{{ $proposition->proposition_const('condition',$proposition->condition) }}</td></tr>
                
                @if($proposition->mail_flag == 1)
                <tr><th class="col-4">郵送</th><td>{{ $proposition->proposition_const('ship_from',$proposition->ship_from) }}</td></tr>
                @else
                <tr><th class="col-4">手渡し</th><td>{{ $proposition->place }}</td></tr>
                @endif
                <tr><th class="col-4">備考</th><td>{{ $proposition->notes }}</td></tr>
            </table>
    </div>
    <div class="repry_btn row">
        @if($proposition->status === 1)
            <div class="repry_item">
                {{ Form::model($proposition, ['route' => ['propositions.update', $proposition->id], 'method' => 'patch']) }}
                {{Form::hidden('status','2')}}
                {{ Form::submit('交換する', ['class' => 'btn btn-primary swap_button']) }}
                {{ Form::close() }}
            </div>
            <div class="repry_item">
                {{ Form::model($proposition, ['route' => ['propositions.update', $proposition->id], 'method' => 'patch']) }}
                {{Form::hidden('status','3')}}
                {{ Form::submit('お断りする', ['class' => 'btn btn-outline-primary swap_button']) }}
                {{ Form::close() }}
            </div>
        @else
            <div class="repry_item">
                <button class="btn btn-primary swap_button" disabled>すでに交換中です</button>
            </div>
        @endif
    </div>
</div>
    @endforeach
@endif
</main>
@include('commons.footer')
@endsection