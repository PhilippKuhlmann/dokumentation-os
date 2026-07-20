<x-app-layout :$customer>

    @can('aduser_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Vorname', 'Nachname', 'Benutzername', 'Passwort', '', ]" />

            <x-table.body>

                @forelse ($adusers as $aduser)

                    <x-table.datarow
                        :values="[
                            $aduser->firstName,
                            $aduser->lastName,
                            $aduser->username,
                            'password' => $aduser->password,
                        ]"

                        editUrl="{{ route('aduser.edit', [$customer, $aduser]) }}"
                        can="aduser_update"
                    />

                @empty
    <tr><td colspan="100" class="px-4 py-8 text-center text-sm text-gray-400 dark:text-gray-500">Noch keine Einträge vorhanden.</td></tr>
@endforelse

            </x-table.body>
        </x-table.main>
    </div>

    <div class="px-3 pb-3">
        {{ $adusers->links() }}
    </div>

</x-app-layout>
