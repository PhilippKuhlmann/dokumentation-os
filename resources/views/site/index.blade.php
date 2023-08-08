<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', '', ]" />

            <x-table.body>

                @foreach ($sites as $site)

                    <x-table.datarow
                        :values="[
                            $site->name,
                        ]"

                        editUrl="/{{ Request::path() }}/{{ $site->id }}/edit"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

