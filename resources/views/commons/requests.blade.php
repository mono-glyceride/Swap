<h3>貰った交換リクエスト</h3>
<div class="exhibit_index">
@if (count($receive_requests) > 0)      
        @foreach ($receive_requests as $receive_request)
                    <div class="col  d-block exhibit_item">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('requests.edit', ['request' => $receive_request ->id]) }}">
                        <img src="{{ asset( 'storage/'.$receive_request->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                
        @endforeach
    {{-- ページネーションのリンク --}}
     {{--{{ $receive_requests->links() }}--}}
            
@endif
</div>