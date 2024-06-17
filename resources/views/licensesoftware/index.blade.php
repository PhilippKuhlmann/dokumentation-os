<x-app-layout :$customer>

    @can('licensesoftware_create')
       <x-sitetopmenu />
    @endcan

    @foreach ($customer->licensesoftware as $licensesoftware)
        <x-card>
            <x-slot:head>
                <x-show.header can="licensesoftware_update" editUrl="{{ route('licensesoftware.edit', [$customer, $licensesoftware]) }}">
                    {{ $licensesoftware->name }}
                </x-show.header>
            </x-slot>

            <x-slot:body>


                <x-minitablecard title="Login" :array="[
                    'Benutzer' => $licensesoftware->username,
                    'Passwort' => $licensesoftware->password,
                ]" />

                <x-minitablecard title="Laufzeit" :array="[
                    'Start Datum' => $licensesoftware->start_date,
                    'End Datum' => $licensesoftware->end_date,
                    'Abrechnung' => $licensesoftware->abo,
                ]" />

                <x-minitextcard title="Datei">
                    {!! $licensesoftware->file_path ? '<a href="'.route('licensesoftware.download', [$customer, $licensesoftware]).'" class="hover:text-cerulean-500">'.$licensesoftware->file_name.' - Download</a>' : 'dfd' !!}
                </x-minitextcard>

                <x-minitextcard title="Key">
                    {{ $licensesoftware->key }}
                </x-minitextcard>




            </x-slot>
        </x-card>
    @endforeach

    {{-- <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Key', 'Benutzer', 'Passwort', 'Abo', 'Download', '' ]" />

            <x-table.body>

                @foreach ($customer->licensesoftware as $licensesoftware)

                    <x-table.datarow
                        :values="[
                            $licensesoftware->name,
                            $licensesoftware->key,
                            $licensesoftware->username,
                            'password' => $licensesoftware->password,
                            $licensesoftware->abo,
                            'download' => $licensesoftware->file_path ?  route('licensesoftware.download', [$customer, $licensesoftware]) : NULL,
                        ]"

                        editUrl="{{ route('licensesoftware.edit', [$customer, $licensesoftware]) }}"
                        can="licensesoftware_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div> --}}

</x-app-layout>

