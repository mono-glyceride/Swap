@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト一覧
    </h1>
</header>
@if (count($exhibits) > 0)
    <div class="exhibit_index">
        @foreach ($exhibits as $exhibit)
            @if(count($exhibit->propositions) > 0)
            <div class="col  d-block exhibit_item">
                <a href="{{ route('propositions.select', ['exhibit_id' => $exhibit ->id]) }}">
                    <img src="{{ $exhibit->pic_id }}" width="70" height="70" >
                    @foreach ($exhibit->propositions as $proposition)
                    <img src="{{ $proposition->pic_id }}" width="70" height="70" >
                    @endforeach
                </a>
            </div>
            @endif
        @endforeach
    </div>
@endif
    <div>
        @if (count($propositions) > 0)      
            <div>
                <h2 class="requ">送った交換リクエスト</h2>
            </div>
            @foreach ($propositions as $proposition)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('propositions.show', ['proposition' => $proposition ->id]) }}">
                        <img src="{{ $proposition->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
        @if (count($reject_propositions) > 0)      
            <div>
                <p>以下のリクエストは成立しませんでした</p>
            </div>
            @foreach ($reject_propositions as $reject_proposition)
                <div class="container">
                    <div class="row">
                        <div class="col  d-block">
                            {{-- 出品詳細ページへのリンク --}}
                            <img src="{{ $reject_proposition->pic_id }}" width="70" height="70" >
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @include('commons.footer')
@endsection