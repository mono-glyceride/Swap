<div class="d-sm-none d-block footer-menu-bar w-100 border-top"> 
  <div class="row m-2">
    <div class="col">
      <a href="{{ route('exhibits.index') }}"><i class="fas fa-home"></i></a> <!-- アイコンを追加 -->
    </div>
    <div class="col">
      <a href="{{ route('users.show', ['user' => Auth::id()]) }}"><i class="far fa-user-circle"></i></a> <!-- アイコンを追加 -->
    </div>
    <div class="col">
      <a href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i></a> <!-- アイコンを追加 -->
        {{ auth()->user() ->count_notifications() }}
    </div>
    <div class="col">
      <a href="{{ route('checklists.index') }}"><i class="fas fa-check"></i></a> <!-- アイコンを追加 -->
        {{ auth()->user() ->count_checklists() }}
    </div>
  </div>
</div>
