<x-app-layout :$customer>

    @can('licensewindows_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Betriebsystem', 'Key', '', ]" />

            <x-table.body>

                @foreach ($licensewindows as $licensewindows)

                    <x-table.datarow
                        :values="[
                            $licensewindows->operatingSystem->name,
                            $licensewindows->key,
                        ]"

                        editUrl="{{ route('licensewindows.edit', [$customer, $licensewindows]) }}"
                        can="licensewindows_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

