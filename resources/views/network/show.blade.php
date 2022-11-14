<x-app-layout :$customer>
    <div class="m-5">

        <x-show.header
            editUrl="/{{ $customer->slug }}/network/{{ $network->id }}/edit"
            deleteUrl="/{{ $customer->slug }}/network/{{ $network->id }}"
        >
            vlan{{ $network->vlanId }} - {{ $network->description }}
        </x-show.header>

        <div class="flex w-full flex-wrap mt-5 gap-5">
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">Netzwerk</span>
                <span class="dark:text-gray-100">{{ $network->network }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">Subnetzmaske</span>
                <span class="dark:text-gray-100">{{ $network->subnetmask }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">CIDR</span>
                <span class="dark:text-gray-100">{{ $network->cidr }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">Gateway</span>
                <span class="dark:text-gray-100">{{ $network->gateway }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">DNS 1</span>
                <span class="dark:text-gray-100">{{ $network->dns1 }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">DNS 2</span>
                <span class="dark:text-gray-100">{{ $network->dns2 }}</span>
            </div>
            <div class="flex flex-col w-60 p-3 rounded-md shadow-md h-auto bg-white dark:bg-gray-800">
                <span class="text-gray-500 dark:text-gray-400">DHCP</span>
                <span class="dark:text-gray-100">{{ $network->dhcpStart }} - {{ $network->dhcpEnd }}</span>
            </div>
        </div>

    </div>











</x-app-layout>
