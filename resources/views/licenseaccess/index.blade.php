<x-app-layout :$customer>

    @can('licenseaccess_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Key', 'Download', '', ]" />

            <x-table.body>

                @foreach ($customer->licenseaccesses as $licenseaccess)

                    <x-table.datarow
                        :values="[
                            $licenseaccess->name,
                            $licenseaccess->key,
                            'download' => $licenseaccess->file_path ?  route('licenseaccess.download', [$customer, $licenseaccess]) : NULL,
                        ]"

                        editUrl="{{ route('licenseaccess.edit', [$customer, $licenseaccess]) }}"
                        can="licenseaccess_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

