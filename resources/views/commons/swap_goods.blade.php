@if (count($receive_requests) > 0)      
        @foreach ($receive_requests as $receive_request)
            <div class="card mb-3" style="max-width: 500px;">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        {{-- メッセージページへのリンク --}}
                        <a href="{{ route('requests.talk', ['id' => $receive_request ->id]) }}">
                            <img src="{{ asset( 'storage/'.$receive_request->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            {!! link_to_route('requests.talk','トークルームへ', ['id' => $receive_request ->id]) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $exhibits->links() }}--}}
            
@endif
