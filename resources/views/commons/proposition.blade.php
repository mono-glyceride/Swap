@if (count($propositions) > 0)      
        @foreach ($propositions as $proposition)
            <div class="container">
                <div class="row">
                    <div class="col  d-block">
                        {{-- リクエスト詳細ページへのリンク --}}
                        <a href="{{ route('propositions.show', ['proposition' => $proposition ->id]) }}">
                        <img src="{{ asset( 'storage/'.$proposition->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $exhibits->links() }}--}}
            
@endif