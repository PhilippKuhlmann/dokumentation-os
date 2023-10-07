<x-app-layout :$customer>
    <x-create.main header="DynDNS bearbeiten" labelsubmit="Ändern" action="{{ route('dyndns.update', [$customer, $dyndns]) }}">
        @method('PATCH')

        <x-create.singlerow label="Anbieter" name="providor" default="{{ $dyndns->providor }}" />

        <x-create.singlerow label="Host" name="host" default="{{ $dyndns->host }}" />

        <x-create.singlerow label="Benutzername" name="username" default="{{ $dyndns->username }}" />

        <x-create.singlerow label="Passwort" name="password" default="{!! $dyndns->password !!}" />

    </x-create.main>

    @can('dyndns_delete')
        <x-deletecard action="{{ route('dyndns.destroy', [$customer, $dyndns]) }}" />
    @endcan

</x-app-layout>
