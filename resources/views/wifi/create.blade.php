<x-app-layout :$customer>
    <x-create.main header="Neues WLAN" action="{{ route('wifi.store', $customer) }}">

            <x-create.select name="site_id" value="Standort" :array="$sites" />

            <x-create.singlerow label="SSID" name="ssid" />

            <x-create.singlerow label="Passwort" name="password" />

            <x-create.singlerow label="Verschlüsselung" name="encryption" />

            <x-create.select.network :$networks/>

    </x-create.main>
</x-app-layout>
