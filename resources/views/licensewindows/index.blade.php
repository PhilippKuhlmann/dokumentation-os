<x-app-layout :$customer>

    @can('licensewindows_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Betriebsystem', 'Key', 'Download', '', ]" />

            <x-table.body>

                @foreach ($licensewindowsList as $licensewindows)

                    <x-table.datarow
                        :values="[
                            $licensewindows->operatingSystem->name,
                            $licensewindows->key,
                            'download' => $licensewindows->file_path ?  route('licensewindows.download', [$customer, $licensewindows]) : NULL,

                        ]"

                        editUrl="{{ route('licensewindows.edit', [$customer, $licensewindows]) }}"
                        can="licensewindows_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

    <div class="px-3 pb-3">
        {{ $licensewindowsList->links() }}
    </div>

</x-app-layout>

