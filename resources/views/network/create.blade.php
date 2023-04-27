<x-app-layout :$customer>

    <div class="flex">

        <div class="flex flex-col p-2 dark:text-gray-100">
            <div class="text-2xl pl-5">
                Neues Netzwerk
            </div>

            <form method="post" action="{{ route('network.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-col">
                    <x-input.label for="description" value="Beschreibung" />
                    <x-input.field id="description" name="description" class="mt-1" value="{{ old('description') }}"
                        autofocus />
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2 grow">
                        <x-input.label for="network" value="Netzwerk" />
                        <x-input.field id="network" name="network" class="mt-1" value="{{ old('network') }}"
                            required />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="vlanId" value="VLAN ID" />
                        <x-input.field type="number" id="vlanId" name="vlanId" class="mt-1 w-32"
                            value="{{ old('vlanId') }}" required />
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2 grow">
                        <x-input.label for="subnetmask" value="Subnetzmaske" />
                        <x-input.field id="subnetmask" name="subnetmask" class="mt-1"
                            value="{{ old('subnetmask') ?? '255.255.255.0' }}" required />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="cidr" value="CIDR" />
                        <x-input.field type="number" id="cidr" name="cidr" class="mt-1 w-32"
                            value="{{ old('cidr') ?? '24' }}" required />
                    </div>
                </div>

                <div class="flex flex-col mt-2">
                    <x-input.label for="gateway" value="Gateway" />
                    <x-input.field id="gateway" name="gateway" class="mt-1" value="{{ old('gateway') }}" required />
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2">
                        <x-input.label for="dns1" value="DNS 1" />
                        <x-input.field id="dns1" name="dns1" class="mt-1" value="{{ old('dns1') }}"
                            required />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="dns2" value="DNS 2" />
                        <x-input.field id="dns2" name="dns2" class="mt-1" value="{{ old('dns2') }}" />
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="flex flex-col mt-2">
                        <x-input.label for="dhcpStart" value="DHCP-Start" />
                        <x-input.field type="number" id="dhcpStart" name="dhcpStart" class="mt-1"
                            value="{{ old('dhcpStart') }}" />
                    </div>

                    <div class="flex flex-col mt-2 ml-2">
                        <x-input.label for="dhcpEnd" value="DHCP-Ende" />
                        <x-input.field type="number" id="dhcpEnd" name="dhcpEnd" class="mt-1"
                            value="{{ old('dhcpEnd') }}" />
                    </div>

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
