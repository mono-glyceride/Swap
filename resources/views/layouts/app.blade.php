<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Swap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="/css/common.css">
        <link rel="stylesheet" href="/css/exhibit/show.css">
        <link rel="stylesheet" href="/css/exhibit/index.css">
        <link rel="stylesheet" href="/css/exhibit/create.css">
        <link rel="stylesheet" href="/css/common/footer.css">
        <link rel="stylesheet" href="/css/user/show.css">
        
    </head>

    <body>
        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
       
    </body>
</html>
