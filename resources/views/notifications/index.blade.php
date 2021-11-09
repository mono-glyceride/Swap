@extends('layouts.app')


@section('content')
        <div class="text-center border border-primary midasi">
                <h1>
                    通知
                </h1>
        </div>
        <ul>
        @if (count($notifications) > 0)      
                @foreach ($notifications as $notification)
                        @if($notification->content_id == 0)
                            {{ Form::open(['route' => ['notifications.update',$notification->id],'method' => 'patch','class'=>'form-horizontal']) }}
                                {{Form::hidden('status','1')}}
                                <button type="submit" class="btn btn-light"><img src="{{$notification->exhibit->pic_id }}" width="70" height="70" >
                                <div>「{{$notification->exhibit->character}} {{$notification->exhibit->goods_type}}」への交換リクエストは成立しませんでした</div></button>
                            {{ Form::close() }}
                        @endif
                @endforeach
            @endif
        </ul>
@endsection