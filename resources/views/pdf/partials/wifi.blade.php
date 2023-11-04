<div class="heading">
    WLAN
</div>

<table class="table">
    <tr>
        <th>SSID</th>
        <th>Netzwerk</th>
        <th>Verschlüsselung</th>
        <th>Passwort</th>
    </tr>
    @foreach ($customer->wifis as $wifi)
        <tr>
            <td>{{ $wifi->ssid }}</td>
            <td>{{ $wifi->network->vlanId }}</td>
            <td>{{ $wifi->encryption }}</td>
            <td>{{ $wifi->password }}</td>
        </tr>
    @endforeach
</table>
