<footer class="basic-footer fixed-bottom row text-center d-flex align-items-center"> 

    <span class="col">
    <a href="{{ route('exhibits.index') }}">
      <i class="fas fa-home fa-lg"></i>
    </a>
    </span>
    
    <span class="col">
    <a href="{{ route('notifications.index') }}">
      <i class="fas fa-bell fa-lg">{{ auth()->user() ->count_notifications() }}</i>
    </a>
    </span>
    
    <span class="col">
    <a href="{{ route('users.show', ['user' => Auth::id()]) }}">
      <i class="far fa-user-circle fa-lg"></i>
    </a>
    </span>
    
    <span class="col">
    <a href="{{ route('messages.index', ['user' => Auth::id()]) }}">
      <i class="fas fa-comments fa-lg"></i>
    </a>
    </span>
    
</footer>
