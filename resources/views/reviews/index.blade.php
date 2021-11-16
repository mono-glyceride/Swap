@extends('layouts.app')


@section('content')
        <div class="text-center border border-primary midasi">
                <h1>
                    評価
                </h1>
        </div>
        <ul>
        @if (count($reviews) > 0)      
                @foreach ($reviews as $review)
                <table class="table table-sm">
                <tr>
                <td>{{$review->reviewer->name}}</td>
                <td>
                 @if($review->point == 0) <i class="fas fa-umbrella"></i>
                 @elseif($review->point == 1) <i class="fas fa-cloud"></i>
                 @else <i class="fas fa-sun"></i>
                 @endif
                </td>
                <td>{{$review->comment}}</td>
                </tr>
                </table>
                @endforeach
            @endif
        </ul>
@endsection