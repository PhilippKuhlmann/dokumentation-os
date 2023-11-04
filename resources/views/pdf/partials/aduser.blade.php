<div class="heading">
    AD-User
</div>

<table class="table">
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Benutzername</th>
        <th>Passwort</th>
    </tr>
    @foreach ($customer->adusers as $aduser)
        <tr>
            <td>{{ $aduser->firstName }}</td>
            <td>{{ $aduser->lastName }}</td>
            <td>{{ $aduser->username }}</td>
            <td>{{ $aduser->password }}</td>
        </tr>
    @endforeach
</table>
