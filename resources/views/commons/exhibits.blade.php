{{-- exhibitのウェルカム参照 
本来は出品されたデータの一覧--}}
    
<div class="exhibit_index">            
@if (count($exhibits) > 0)      
        @foreach ($exhibits as $exhibit)
                    <div class="col  d-block exhibit_item">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('exhibits.show', ['exhibit' => $exhibit ->id]) }}">
                        <img src="{{ $exhibit->pic_id }}" width="70" height="70" >
                        </a>
                    </div>
            
        @endforeach
        
        <div class="page">{{$exhibits->links()}}</div>

    {{-- ページネーションのリンク --}}
     {{--{{ $exhibits->links() }}--}}
            
@endif

</div>