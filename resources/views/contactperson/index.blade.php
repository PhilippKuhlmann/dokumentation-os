<x-app-layout :$customer>

    <x-sitetopmenu />

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Tel.', 'E-Mail', '', ]" />

            <x-table.body>

                @foreach ($contactpersons as $contactperson)

                    <x-table.datarow
                        :values="[
                            $contactperson->first_name . ' ' . $contactperson->last_name,
                            $contactperson->phone,
                            $contactperson->mail,

                        ]"

                        editUrl="/{{ Request::path() }}/{{ $contactperson->id }}/edit"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

