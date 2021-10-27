@if (count($receive_propositions) > 0)      
        @foreach ($receive_propositions as $receive_proposition)
            <div class="card mb-3" style="max-width: 500px;">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        {{-- メッセージページへのリンク --}}
                        <a href="{{ route('propositions.talk', ['id' => $receive_proposition ->id]) }}">
                            <img src="{{ asset( 'storage/'.$receive_proposition->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            {!! link_to_route('propositions.talk','トークルームへ', ['id' => $receive_proposition ->id]) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $exhibits->links() }}--}}
            
@endif
