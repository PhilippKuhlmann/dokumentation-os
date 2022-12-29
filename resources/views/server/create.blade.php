<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neuer Server
            </div>
            <form method="post" action="{{ route('server.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="name" placeholder="Name" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" />
                    <x-input.field name="model" placeholder="Modell"/>
                    <x-input.field name="serialNumber" placeholder="SNr"/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip1" placeholder="IP 1" />
                    <x-input.field name="ip2" placeholder="IP 2" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="bmcIp" placeholder="BMC IP" />
                    <x-input.field name="bmcUser" placeholder="BMC User" />
                    <x-input.field name="bmcPassword" placeholder="BMC Passwort" />
                </div>
                <div class="flex flex-col gap-3 mb-3">
                    <x-input.select name="server_operating_system_id">
                        @foreach ($serverOperatingSystems as $os)
                            <option value="{{ $os->id }}">{{ $os->name }}</option>
                        @endforeach
                    </x-input.select>
                </div>
                <div class="flex flex-col gap-3 mb-3">
                    <label for="services" class="dark:text-white text-xs">Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)</label>
                    <x-input.field id="services" name="services" placeholder="Dienste" />
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
