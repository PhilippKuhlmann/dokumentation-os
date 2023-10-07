<x-app-layout :$customer>

    @can('loginwebsite_create')
        <x-sitetopmenu />
    @endcan

    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', 'Benutzername', 'Passwort', 'URL', '', ]" />

            <x-table.body>

                @foreach ($customer->loginwebsites as $loginwebsite)

                    <x-table.datarow
                        :values="[
                            $loginwebsite->name,
                            $loginwebsite->username,
                            'password' => $loginwebsite->password,
                            'url' => $loginwebsite->url,
                        ]"

                        editUrl="{{ route('loginwebsite.edit', [$customer, $loginwebsite]) }}"
                        can="loginwebsite_update"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
