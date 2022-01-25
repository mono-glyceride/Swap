@extends('layouts.app')
@section('content')
<header class="sticky-top">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        {{$user->name}}さんの評価 {{$user->review_avarage()}}
    </h1>
</header>
    
@if (count($reviews) > 0)
    <table class="list-group">
        @foreach ($reviews as $review) 
                <tr class="list-group-item">
                    <td class="col-2">{{$review->reviewer->name}}</td>
                    <td class="col-1">
                        @if($review->point == 0) <i class="fas fa-umbrella fa-2x"></i>
                        @else <i class="fas fa-sun fa-2x"></i>
                        @endif
                    </td>
                    <td class="col-9">
                        {{$review->comment}}
                    </td>
                </tr>
        @endforeach
    </table>
@endif
@include('commons.footer')
@endsection