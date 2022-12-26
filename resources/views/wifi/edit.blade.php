<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                WLAN bearbeiten
            </div>
            <form method="post" action="{{ route('wifi.update', [$customer, $wifi]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ssid" placeholder="SSID" value="{{ $wifi->ssid }}" autofocus/>
                    <x-input.field name="password" placeholder="Passwort" value="{{ $wifi->password }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="vlan" placeholder="VLAN" value="{{ $wifi->vlan }}" />
                    <x-input.field name="encryption" placeholder="Verschlüsselung" value="{{ $wifi->encryption }}" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-input.button label="Ändern" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
