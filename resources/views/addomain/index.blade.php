<x-app-layout :$customer>
    <x-sitetopmenu />

    @foreach ($customer->addomains as $addomain)
        <x-card>
            <x-slot:head>
                <x-show.header editUrl="{{ route('addomain.edit', [$customer, $addomain]) }}">
                    AD-Domäne
                </x-show.header>
            </x-slot>

            <x-slot:body>

                <x-minitablecard title="Domäne" :array="[
                    'Domäne' => $addomain->domain,
                    'NETBIOS' => $addomain->netbios,
                    'DSRM Passwort' => $addomain->dsrmpassword,
                ]" />

            </x-slot>
        </x-card>
    @endforeach

</x-app-layout>
