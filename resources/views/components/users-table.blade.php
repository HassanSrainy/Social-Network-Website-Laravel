@props(['users'])
<div>
<table class="table">
    <tr>
        <th>ID</th>
        <th>nom</th>
        <th>metier</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{$user['id']}} </td>
            <td>{{$user['nom']}} </td>
            <td>{{$user['metier']}}</td>
        </tr>
    @endforeach
</table>
</div>