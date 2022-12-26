<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="{{ route('vm.create', [$customer]) }}" />
    </x-sitetopmenu>

    @foreach ($customer->vms as $vm)
        <x-card>
            <x-slot:head>
                <x-show.header
                    editUrl="{{ route('vm.edit', [$customer, $vm]) }}"
                    deleteUrl="{{ route('vm.destroy', [$customer, $vm]) }}">
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
                    {{ $vm->serverOperatingSystem->name }}
                </x-minitextcard>

            </x-slot>
        </x-card>
    @endforeach
</x-app-layout>
