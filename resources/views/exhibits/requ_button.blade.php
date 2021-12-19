
@if (Auth::id() == $exhibit->exhibitor_id) 
        {!! Form::model($exhibit, ['route' => ['exhibits.update', $exhibit->id], 'method' => 'patch','class' =>'requ_form']) !!}
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
        <a href="{{ route('propositions.create_mail', ['id' => $exhibit->id]) }}" class="requ_button btn btn-primary">リクエスト【郵送】</a>
        <a href="{{ route('propositions.create_handing', ['id' => $exhibit->id]) }}" class="requ_button btn btn-outline-primary">リクエスト【手渡し】</a>
    </div>
@endif

@endif