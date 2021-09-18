
@if (Auth::id() == $exhibit->exhibitor_id) 
    <a href="{{ route('exhibits.destroy', ['exhibit' => $exhibit->id]) }}">
        <button class="btn btn-danger btn-block requ_button">この出品を削除</button>
    </a>
    
@else
{{--この出品が受け取ったリクエストのなかに、閲覧ユーザーからのものはあるか--}}
    @if ($exhibit->requests()->where('requester_id', Auth::id())->exists())
        <p>この出品へはすでに交換リクエストを送っています</p>
    @else
     <a href="{{ route('requests.create', ['id' => $exhibit->id]) }}">
        <button class="btn btn-primary btn-block requ_button">交換リクエストを送る</button>
    </a>
    @endif

@endif

<style>
     .requ_button{
        margin-bottom:100px;
    }
    .requ_button:hover{
        opacity:1;
    }
</style>