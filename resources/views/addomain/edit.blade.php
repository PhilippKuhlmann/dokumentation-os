<x-app-layout :$customer>
    <x-create.main header="AD-Domäne bearbeiten" labelsubmit="Ändern" action="{{ route('addomain.update', [$customer, $addomain]) }}">
        @method('PATCH')

        <x-create.singlerow label="Domäne" name="domain" default="{{ $addomain->domain }}" />

        <x-create.singlerow label="NETBIOS" name="netbios" default="{{ $addomain->netbios }}" />

        <x-create.singlerow label="DSRM Passwort" name="dsrmpassword" default="{!! $addomain->dsrmpassword !!}" />

        <x-edit.hidden hidden="{{ $addomain->hidden }}" />

    </x-create.main>

    @can('addomain_delete')
        <x-deletecard action="{{ route('addomain.destroy', [$customer, $addomain]) }}" />
    @endcan

</x-app-layout>
