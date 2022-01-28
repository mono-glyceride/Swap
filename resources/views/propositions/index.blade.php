@extends('layouts.app')


@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
            交換リクエスト一覧
    </h1>
</header>
<main>
<div class="list-group">
    @if (count($exhibits) > 0)
        <div>
            <h2 class="requ">貰った交換リクエスト（保留中）</h2>
        </div>
        <div class="exhibit_index">
            @foreach ($exhibits as $exhibit)
                @if($exhibit->is_proposed())
                    <a href="{{ route('propositions.select', ['exhibit_id' => $exhibit ->id]) }}">
                    <div class="col  d-block list-group-item list-group-item-action">
                        <img src="{{ $exhibit->pic_id }}" width="70" height="70" >
                        @foreach ($exhibit->propositions as $proposition)
                            <img src="{{ $proposition->pic_id }}" width="70" height="70" >
                        @endforeach
                    </div>
                    </a>
                @endif
            @endforeach
        </div>
    @endif
    <div>
    @if (count($propositions) > 0)      
        <div>
            <h2 class="requ">送った交換リクエスト(申請中)</h2>
        </div>
            @foreach ($propositions as $proposition)
                <div class="">
                    <a href="{{ route('propositions.show', ['proposition' => $proposition ->id]) }}">
                        <div class="list-group-item list-group-item-action">
                            <img src="{{ $proposition->pic_id }}" width="70" height="70" >
                            <img src="{{ $proposition->exhibit->pic_id }}" width="70" height="70" >
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
        @if (count($reject_propositions) > 0)      
            <div>
                <h2 class="requ">成立しなかった交換リクエスト</h2>
            </div>
            @foreach ($reject_propositions as $reject_proposition)
                <div class="row  d-block list-group-item align-items-center">
                    <img src="{{ $reject_proposition->pic_id }}" width="70" height="70">
                    <img src="{{ $reject_proposition->exhibit->pic_id }}" width="70" height="70">
    　               {{ Form::open(['route' => ['propositions.destroy',$reject_proposition->id],'method' => 'delete','class'=>'reject_btn']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-outline-secondary']) }}
                    {{ Form::close() }}
                </div>
            @endforeach
        @endif
    @include('commons.footer')
</div>
</main>
@endsection