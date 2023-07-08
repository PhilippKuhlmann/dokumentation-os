<x-app-layout :$customer>
    <x-create.main header="TK-Anlage bearbeiten" labelsubmit="Speichern" action="{{ route('phoneSystem.update', [$customer, $phoneSystem]) }}">
        @method('PATCH')

        <x-create.doublerow label1="Hersteller" name1="manufacturer" default1="{{ $phoneSystem->manufacturer }}" label2="Model" name2="model" default2="{{ $phoneSystem->model }}" />

        <x-create.singlerow label="Seriennummer" name="serialNumber" default="{{ $phoneSystem->serialNumber }}" />

        <x-create.doublerow label1="IP 1" name1="ip1" default1="{{ $phoneSystem->ip1 }}" label2="Port" name2="port" type2="number" default2="{{ $phoneSystem->port }}" />

        <x-create.doublerow label1="IP 2" name1="ip2" default1="{{ $phoneSystem->ip2 }}" label2="IP 3" name2="ip3" default2="{{ $phoneSystem->ip3 }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $phoneSystem->username }}" label2="Passwort" name2="password" default2="{!! $phoneSystem->password !!}" />

    </x-create.main>

    <x-deletecard action="{{ route('phoneSystem.destroy', [$customer, $phoneSystem]) }}" />

</x-app-layout>
