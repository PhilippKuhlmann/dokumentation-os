<x-app-layout :$customer>
    <x-create.main header="Neue VM" action="{{ route('vm.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <div class="flex flex-col mt-2">
            <x-input.label for="server_id" value="Host (Server)" />
            <x-input.select id="server_id" name="server_id">
                <option value="">— kein Host —</option>
                @foreach ($servers as $server)
                    <option value="{{ $server->id }}" {{ $server->id == old('server_id') ? 'selected' : '' }}>{{ $server->name }}</option>
                @endforeach
            </x-input.select>
        </div>

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow label1="IP 1" name1="ip1" label2="IP 2" name2="ip2" />

        <x-create.doublerow label1="Rustdesk ID" name1="remoteID" label2="Rustdesk Passwort" name2="remotePassword" />

        <x-create.select.operatingsystem :$operatingSystems/>

        <x-create.singlerow label="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" name="services" />

    </x-create.main>
</x-app-layout>
