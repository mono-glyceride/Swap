@extends('layouts.app')

@section('content')
    <header class="row">
        {{ Form::open(['route' => 'exhibits.search', 'class' => 'col-10 search_bar d-flex align-items-center', 'method' => 'get']) }}
        {{Form::search('keyword', null, ['id' => 'keyword','class' => 'form-control rounded-pill ','placeholder'=>'グッズ検索'])}}
        {{--{{ Form::submit('検索', ['class' => 'btn btn-light']) }}--}}
        {{ Form::close() }}
        <div class="col-2 check_icon d-flex align-items-center">
                <a href="{{ route('checklists.index') }}">
                    <i class="fas fa-check fa-lg"></i>
                </a>
        </div>
    </header>
        {{-- 出品一覧 --}}
        @include('../commons.exhibits')
        @include('exhibits.exhibit_button')
@endsection