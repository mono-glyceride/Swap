
@if (Auth::id() == $exhibit->exhibitor_id) 
    <div>
        {!! Form::model($exhibit, ['route' => ['exhibits.update', $exhibit->id], 'method' => 'patch']) !!}
    　  {{Form::hidden('status','3')}}
        {!! Form::submit('この出品を削除', ['class' => 'btn btn-danger btn-block requ_button']) !!}
        {!! Form::close() !!}
    </div>
    
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