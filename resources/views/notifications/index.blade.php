@extends('layouts.app')


@section('content')
    <header class="sticky-top d-block d-sm-none">
        <h1 class="d-flex align-items-center">
            @include('commons.back_button')
            通知
        </h1>
    </header>
    @if (count($notifications) > 0)      
        @foreach ($notifications as $notification)
            @if($notification->content_id == 0)
                {{ Form::open(['route' => ['notifications.update',$notification->id],'method' => 'patch','class'=>'form-horizontal']) }}
                {{Form::hidden('status','1')}}    
                <div class="lists">    
                    <div class="row align-items-center d-flex">    
                        <img src="{{$notification->exhibit->pic_id }}" class="col-3 listsimg">
                        <div class="col-9">
                            「{{$notification->exhibit->character}} {{$notification->exhibit->goods_type}}」への交換リクエストは成立しませんでした
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            @endif
        @endforeach
    @endif
@endsection