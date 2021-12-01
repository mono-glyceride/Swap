<a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link">
    <p>出品したユーザー：{{ $user->name }}</p>
</a>