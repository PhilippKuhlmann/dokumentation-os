<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neues WLAN
            </div>
            <form method="post" action="{{ route('wifi.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ssid" placeholder="SSID" autofocus/>
                    <x-input.field name="password" placeholder="Passwort" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="vlan" placeholder="VLAN" />
                    <x-input.field name="encryption" placeholder="Verschlüsselung"/>
                </div>
                <div class="flex flex-row gap-3">
                    <x-input.button label="Hinzufügen" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
