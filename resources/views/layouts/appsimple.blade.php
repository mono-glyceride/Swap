<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Swap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="/css/common.css">
        <link rel="stylesheet" href="/css/simple.css">
    </head>

    <body>
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

        <div class="container">
            <div class="simple_nav d-none d-sm-block">
            @include('commons.navbar')
            </div>
            @yield('content')
        <div>
        

    </body>
</html>
