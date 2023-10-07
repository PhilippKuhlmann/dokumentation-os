<x-app-layout :$customer>

    @can('contactperson_create')
       <x-sitetopmenu />
    @endcan

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

                        editUrl="{{ route('contactperson.edit', [$customer, $contactperson]) }}"
                        can="contactperson_update"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>

