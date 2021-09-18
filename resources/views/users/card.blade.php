<div class="f-item  d-block">
        <img src="{{ asset('storage/images/icon.png') }}" width="70" height="70">
<div>
    
    <table class="table table-sm">
        <tr>    <th>名前</th> <td>{{ $user->name }}</td>
                <th>年齢</th> <td>{{ $user->age }}</td>
                <th>地域</th> <td>{{ $user->prefecture }}</td>
                <th>性別</th> <td>{{ $user->gender }}</td>
        </tr>        
    </table>
    
<style>
.table{
    margin-bottom:  2em;
    margin-top:  1em;
}
</style>
    
    