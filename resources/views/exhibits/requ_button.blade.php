
@if (Auth::id() == $exhibit->exhibitor_id) 
        {!! Form::model($exhibit, ['route' => ['exhibits.update', $exhibit->id], 'method' => 'patch']) !!}
        {{Form::hidden('status','3')}}
        {!! Form::submit('この出品を削除', ['class' => 'btn btn-danger requ_button']) !!}
        {!! Form::close() !!}
    </div>
    
@else
{{--この出品が受け取ったリクエストのなかに、閲覧ユーザーからのものはあるか--}}
    @if ($exhibit->propositions()->where('user_id', Auth::id())->exists())
        <p>この出品へはすでに交換リクエストを送っています</p>
    @else
    <div>
        <div class="repry_item">
            <a href="{{ route('propositions.create_mail', ['id' => $exhibit->id]) }}">
            <button class="btn btn-primary requ_button ">交換リクエスト【郵送】</button>
            </a>
        </div>
        <div>
            <a href="{{ route('propositions.create_handing', ['id' => $exhibit->id]) }}">
            <button class="btn btn-outline-primary requ_button">交換リクエスト【手渡し】</button>
            </a>
        </div>
    </div>
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