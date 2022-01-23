<a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link">
    <div class="row user_info">
        <div class="icon col-3 border">
        </div>
        <div class="col-9">
            <div>
                <p><b>{{ $user->name }}</b>
                @if($user->reviewers()->exists())
                    評価はまだありません。
                @else
                    <br>平均評価：{{$user->review_avarage()}}</p>
                @endif
            </div>
            
        </div>
    </div>
</a>