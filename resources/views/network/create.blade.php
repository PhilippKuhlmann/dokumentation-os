<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neues Netzwerk
            </div>
            <form method="post" action="/{{ $customer->slug }}/network" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field type="number" name="vlanId" placeholder="VLAN ID" autofocus/>
                    <x-input.field name="description" placeholder="Beschreibung" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="network" placeholder="Netzwerk" />
                    <x-input.field name="subnetmask" placeholder="Subnetzmaske" />
                    <x-input.field name="cidr" placeholder="CIDR" class="w-16" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="gateway" placeholder="Gateway" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="dns1" placeholder="DNS 1" />
                    <x-input.field name="dns2" placeholder="DNS 2" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="dhcpStart" placeholder="DHCP-Start" />
                    <x-input.field name="dhcpEnd" placeholder="DHCP-End" />
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
