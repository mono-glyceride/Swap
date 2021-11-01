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
                            <a href="{{ route('propositions.show', ['proposition' => $notification->proposition->id]) }}">
                                <figure>
                                <img src="{{$notification->proposition->exhibit->pic_id }}" width="70" height="70" >
                                <figcaption>「{{$notification->proposition->exhibit->character}} {{$notification->proposition->exhibit->goods_type}}」
                                への交換リクエストは成立しませんでした。</figcaption>
                                </figure>
                            </a>
                        @endif
                @endforeach
            @endif
        </ul>
@endsection