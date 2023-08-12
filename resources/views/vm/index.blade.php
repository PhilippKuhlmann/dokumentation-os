<x-app-layout :$customer>

    <x-sitetopmenu />

    @foreach ($vms as $vm)
        <x-card>
            <x-slot:head>
                <x-show.header
                    editUrl="{{ route('vm.edit', [$customer, $vm]) }}"
                    deleteUrl="{{ route('vm.destroy', [$customer, $vm]) }}">
                    @if ($vm->remoteID AND $vm->remotePassword)
                        <a href="rustdesk://connection/new/{{ $vm->remoteID }}?password={{ $vm->remotePassword }}" class=" bg-ssystemblue text-gray-100 rounded-md px-4 py-2 text-sm mr-5 hover:bg-blue-600">Verbinden</a>
                    @endif
                    {{ $vm->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Netzwerk" :array="[
                    'IP-Adresse 1' => $vm->ip1,
                    'IP-Adresse 2' => $vm->ip2,
                ]" />

                <x-minitagcard title="Dienste" :array="$vm->services" />

                <x-minitextcard title="Betriebsystem">
                    {{ $vm->operatingSystem->name }}
                </x-minitextcard>

            </x-slot>
        </x-card>
    @endforeach
</x-app-layout>
