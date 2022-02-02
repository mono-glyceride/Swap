<a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link">
    <div class="row user_info">
        <div class="icon col-3 border">
        </div>
        <div class="col-9">
            <div>
                <p><b>{{ $user->name }}</b>
                @if($user->reviewers->isEmpty())
                    評価はまだありません。
                @else
                    <br>評価：{{$user->review_avarage()}} / 5.0 （{{count($user->reviewers)}}件）
                @endif
            </p>
            </div>
            
        </div>
    </div>
</a>