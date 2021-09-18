<header class="mb-4 sticky-top">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    @if (Auth::check())
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar ">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="btn-toolbar">
            <div class="btn-group ml-auto">
                <a href="{{ route('logout.get') }}" class="nav-link">
                    <button class="btn btn-info">ログアウト</button>
                </a>
            </div>
        </div>
    

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <div class="d-sm-none d-block w-100">
                    <img src="{{ asset('storage/images/icon.png') }}" width="70" height="70">
                </div>
                
                <li class="d-none d-md-block nav-item">
                {{-- PCの追加メニュー --}}
                <a href="{{ route('exhibits.index') }}" class="nav-link">ホーム</a>
                </li>
                    
                    
                <li class="d-none d-md-block nav-item">
                {{-- PCの追加メニュー --}}
                <a href="{{ route('users.show', ['user' => Auth::id()]) }}" class="nav-link">マイページ</a>
                </li>
                
                <li class="d-none d-md-block nav-item">
                {{-- PCの追加メニュー --}}
                <a href="{{ route('exhibits.create') }}" class="nav-link">出品</a>
                </li>
                
                {{-- プロフィール編集へのリンク --}}
                <li class="nav-item">
                    <a href="{{ route('users.edit', ['user' => Auth::id()])}}" }}" class="nav-link">プロフィール編集</a>
                </li>
                
                {{-- 交換リクエストへのリンク --}}
                <li class="nav-item">
                    <a href="{{ route('requests.index') }}" class="nav-link">交換リクエスト一覧</a>
                </li>
                
                {{-- 取引中へのリンク--}}
                <li class="nav-item">
                    <a href="{{ route('requests.swapping', ['id' => Auth::id()])}}" class="nav-link">取引中一覧</a>
                </li>
                
                
                {{-- 出品中へのリンク --}}
                <li class="nav-item">
                    <a href="{{ route('exhibits.wanted', ['id' => Auth::id()]) }}" class="nav-link">出品中一覧</a>
                </li>
            </ul>
        </div>
    
    @else
        <div class="btn-toolbar">
            <div class="btn-group ml-auto">
                <button class="btn btn-info"><a href="{{ route('signup.get') }}">新規登録</a></button>
                <button class="btn btn-info"><a href="{{ route('login') }}" >ログイン</a></button>
            </div>
        </div>
    @endif
    
    </nav>
</header>