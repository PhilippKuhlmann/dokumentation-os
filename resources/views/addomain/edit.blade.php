<x-app-layout :$customer>
    <x-create.main header="AD-Domäne bearbeiten" labelsubmit="Ändern" action="{{ route('addomain.update', [$customer, $addomain]) }}">
        @method('PATCH')

        <x-create.singlerow label="Domäne" name="domain" default="{{ $addomain->domain }}" />

        <x-create.singlerow label="NETBIOS" name="netbios" default="{{ $addomain->netbios }}" />

        <x-create.singlerow label="DSRM Passwort" name="dsrmpassword" default="{!! $addomain->dsrmpassword !!}" />

    </x-create.main>

    <x-deletecard action="{{ route('addomain.destroy', [$customer, $addomain]) }}" />

</x-app-layout>
