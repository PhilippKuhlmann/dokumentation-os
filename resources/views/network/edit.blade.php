<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-800">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Netzwerk Bearbeiten
            </div>
            <form method="post" action="/{{ $customer->slug }}/network/{{ $network->id }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field type="number" name="vlanId" placeholder="VLAN ID" value="{{ $network->vlanId }}" autofocus/>
                    <x-inputs.field name="description" placeholder="Beschreibung" value="{{ $network->description }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="network" placeholder="Netzwerk" value="{{ $network->network }}" />
                    <x-inputs.field name="subnetmask" placeholder="Subnetzmaske" value="{{ $network->subnetmask }}" />
                    <x-inputs.field name="cidr" placeholder="CIDR" class="w-16" value="{{ $network->cidr }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="gateway" placeholder="Gateway" value="{{ $network->gateway }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="dns1" placeholder="DNS 1" value="{{ $network->dns1 }}" />
                    <x-inputs.field name="dns2" placeholder="DNS 2" value="{{ $network->dns2 }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="dhcpStart" placeholder="DHCP-Start" value="{{ $network->dhcpStart }}" />
                    <x-inputs.field name="dhcpEnd" placeholder="DHCP-End" value="{{ $network->dhcpEnd }}" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-inputs.button label="Update" />
                </div>

            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
