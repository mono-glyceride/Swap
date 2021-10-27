<h3>貰った交換リクエスト</h3>
<div class="exhibit_index">
@if (count($receive_propositions) > 0)      
        @foreach ($receive_propositions as $receive_proposition)
                    <div class="col  d-block exhibit_item">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('propositions.edit', ['proposition' => $receive_proposition ->id]) }}">
                        <img src="{{ asset( 'storage/'.$receive_proposition->pic_id )}}" width="70" height="70" >
                        </a>
                    </div>
                
        @endforeach
    {{-- ページネーションのリンク --}}
            
@endif
</div>