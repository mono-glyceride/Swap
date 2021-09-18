@if (count($requests) > 0)      
        @foreach ($requests as $request)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- リクエスト詳細ページへのリンク --}}
                        <a href="{{ route('requests.show', ['request' => $request ->id]) }}">
                        <img src="{{ asset( 'storage/'.$request->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $exhibits->links() }}--}}
            
@endif