{{--  出品されたデータの一覧--}}
    
<main class="row">           
@if (count($exhibits) > 0)      
        @foreach ($exhibits as $exhibit)
                    <div class="col-4 col-md-3 col-md-2 col-xl-1 thumbnail">
                        {{-- 出品詳細ページへのリンク --}}
                        <a href="{{ route('exhibits.show', ['exhibit' => $exhibit ->id]) }}" >
                        <img src="{{ $exhibit->pic_id }}">
                        </a>
                    </div>
        @endforeach
        <div class="page">{{$exhibits->links()}}</div>

@endif

</main>