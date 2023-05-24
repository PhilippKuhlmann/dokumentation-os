<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neuer Server
            </div>
            <form method="post" action="{{ route('server.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-col">
                    <x-input.label for="name" value="Name" />
                    <x-input.field id="name" name="name" class="mt-1" value="{{ old('name') }}" required autofocus />
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2 grow">
                        <x-input.label for="manufacturer" value="Hersteller" />
                        <x-input.field id="manufacturer" name="manufacturer" class="mt-1" value="{{ old('manufacturer') }}" />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="model" value="Model" />
                        <x-input.field id="model" name="model" class="mt-1 w-48" value="{{ old('model') }}" />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="serialNumber" value="SNr" />
                        <x-input.field id="serialNumber" name="serialNumber" class="mt-1 w-48" value="{{ old('serialNumber') }}" />
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2 grow">
                        <x-input.label for="ip1" value="IP 1" />
                        <x-input.field id="ip1" name="ip1" class="mt-1" value="{{ old('ip1') }}" required />
                    </div>

                    <div class="flex flex-col mt-2 ml-2 grow">
                        <x-input.label for="ip2" value="IP 2" />
                        <x-input.field id="ip2" name="ip2" class="mt-1" value="{{ old('ip2') }}" />
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2 grow">
                        <x-input.label for="bmcIp" value="BMC IP" />
                        <x-input.field id="bmcIp" name="bmcIp" class="mt-1" value="{{ old('bmcIp') }}" />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="bmcUser" value="BMC User" />
                        <x-input.field id="bmcUser" name="bmcUser" class="mt-1 w-48" value="{{ old('bmcUser') }}" />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="bmcPassword" value="BMC Passwort" />
                        <x-input.field id="bmcPassword" name="bmcPassword" class="mt-1 w-48" value="{{ old('bmcPassword') }}" />
                    </div>
                </div>

                <div class="flex flex-col mt-2">
                    <x-input.label for="server_operating_system_id" value="Betriebsystem" />
                    <x-input.select id="server_operating_system_id" name="server_operating_system_id">
                        @foreach ($serverOperatingSystems as $os)
                            <option value="{{ $os->id }}">{{ $os->name }}</option>
                        @endforeach
                    </x-input.select>
                </div>

                <div class="flex flex-col mt-2 grow">
                    <x-input.label for="services" value="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" />
                    <x-input.field id="services" name="services" class="mt-1" value="{{ old('services') }}" />
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
