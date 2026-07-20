<x-app-layout :$customer>

    @can('radiocenter_create')
        <x-sitetopmenu />
    @endcan

    @foreach ($radiocenters as $radiocenter)
    <x-card>
        <x-slot:head>
            <x-show.header can="radiocenter_update" editUrl="{{ route('radiocenter.edit', [$customer, $radiocenter]) }}">
                Standort: {{ $radiocenter->site->name }}
            </x-show.header>
        </x-slot>

        <x-slot:body>

            <x-minitablecard title="Allgemein" :array="[
                'Frequenz' => $radiocenter->frequency . ' Mhz',
                'Kanalabstand' => $radiocenter->channel_spacing . ' kHz',
                'Leistung' => $radiocenter->power . ' W',
            ]" />

            <x-minitablecard title="Selektivruf" :array="[
                'Auswerter' => $radiocenter->evaluator,
                'Geber' => $radiocenter->encoder,
                'Quittung' => $radiocenter->receipt,
            ]" />

            <x-minitablecard title="Pilotton" :array="[
                'Pilotton' => $radiocenter->pilot_tone . ' Hz',
            ]" />

            <x-minitablecard title="Übertragungsart" :array="[
                'Pilotton' => $radiocenter->transmission_type,
            ]" />

        </x-slot>
    </x-card>
@endforeach


    <div class="px-3 pb-3">
        {{ $radiocenters->links() }}
    </div>

</x-app-layout>
