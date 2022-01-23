@extends('layouts.app')
@section('content')
<header class="sticky-top d-block d-sm-none">
    <h1 class="d-flex align-items-center">
        @include('commons.back_button')
        SNS連携
    </h1>
</header>
<div class="sns">
    @if(auth()->user()->line_id == null)
        <a href="{{ route('linelogin') }}" class="row">
            <div class="col-3">
                <i class="fab fa-line fa-4x"></i>
            </div>
            <div class="col">
                <p>取引に関する通知を公式LINEから受け取ることができます。</p>
            </div>
        </a>
    @else
    <a href="#">
        <div class="col-3">
            <i class="fab fa-line fa-4x"></i>
        </div>
        <div class="col">
            <p>LINEは既に連携済です</p>
        </div>
    </a>
    @endif
</div>
@endsection