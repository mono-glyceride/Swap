<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar ">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="btn-toolbar">
      <div class="btn-group ml-auto">
        <button class="btn btn-info">新規登録</button>
        <button class="btn btn-info">ログイン</button>
      </div>
    </div>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <div class="d-sm-none d-block w-100">
                    <img src="{{ asset('storage/images/icon.png') }}" width="70" height="70">
                </div>
                {{-- プロフィール編集へのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">プロフィール編集</a></li>
                {{-- 交換リクエストへのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">交換リクエスト</a></li>
                {{-- 取引中へのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">取引中一覧</a></li>
                {{-- 出品中へのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">出品中一覧</a></li>
            </ul>
        </div>
    </nav>
</header>