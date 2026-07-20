<x-app-layout :$customer>
    <x-create.main header="Maschine bearbeiten" labelsubmit="Speichern" action="{{ route('machine.update', [$customer, $machine]) }}">
        @method('PATCH')

        <x-edit.select name="site_id" value="Standort" selector="{{ $machine->site_id }}" :array="$sites" />

        <x-create.singlerow label="Name" name="name" :default="$machine->name" />

        <x-create.singlerow label="IP" name="ip" :default="$machine->ip" />

    </x-create.main>

    <livewire:device-ip-addresses :model="$machine" :customer="$customer" />

    @can('machine_delete')
        <x-deletecard action="{{ route('machine.destroy', [$customer, $machine]) }}" />
    @endcan

</x-app-layout>
