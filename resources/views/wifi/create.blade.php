<x-app-layout :$customer>

    <div class="flex">

        <div class="flex flex-col p-2 dark:text-gray-100">
            <div class="text-2xl pl-5">
                Neues WLAN
            </div>

            <form method="post" action="{{ route('wifi.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-col">
                    <x-input.label for="ssid" value="SSID" />
                    <x-input.field id="ssid" name="ssid" class="mt-1" value="{{ old('ssid') }}"
                        autofocus />
                </div>

                <div class="flex flex-col mt-2 ">
                    <x-input.label for="password" value="Password" />
                    <x-input.field id="password" name="password" class="mt-1" value="{{ old('password') }}"
                        required />
                </div>

                <div class="flex flex-col mt-2">
                    <x-input.label for="encryption" value="Verschlüsselung" />
                    <x-input.field id="encryption" name="encryption" class="mt-1" value="{{ old('encryption') }}" required />
                </div>

                <div class="flex flex-col mt-2">
                    <x-input.label for="vlanId" value="VLAN ID" />
                    <x-input.field  type="number" id="vlanId" name="vlanId" class="mt-1" value="{{ old('vlanId') }}" required />
                </div>

                <div class="flex flex-row gap-3 mt-5">
                    <x-input.button label="Hinzufügen" />
                </div>

            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
