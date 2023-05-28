<x-app-layout :$customer>
    <x-create.main header="VM bearbeiten" labelsubmit="Ändern" action="{{ route('vm.update', [$customer, $vm]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $vm->name }}" />

        <x-create.doublerow label1="IP 1" name1="ip1" default1="{{ $vm->ip1 }}" label2="IP 2" name2="ip2" default2="{{ $vm->ip2 }}" />

            <x-edit.select.operatingsystem selector="{{ $vm->operatingSystem->id }}" :$operatingSystems/>

        <x-create.singlerow label="Dienste Bitte mit komma getrennt angeben (eins,zwei,drei)" name="services" default="{{ implode(',', $vm->services) }}" />

    </x-create.main>

    <x-deletecard action="{{ route('vm.destroy', [$customer, $vm]) }}" />

</x-app-layout>

