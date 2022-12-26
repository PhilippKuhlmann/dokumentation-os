<x-app-layout :$customer>

    <x-sitetopmenu>
        <x-input.linkbutton label="Neu" link="{{ route('loginwebsite.create', [$customer]) }}" />
    </x-sitetopmenu>

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
                        deleteUrl="{{ route('loginwebsite.destroy', [$customer, $loginwebsite]) }}"
                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
