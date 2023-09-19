<x-app-layout :$customer>

    <x-sitetopmenu />

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

                        editUrl="/{{ Request::path() }}/{{ $licensewindows->id }}/edit"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

