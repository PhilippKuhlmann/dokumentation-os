<x-admin-layout>

    <div class="flex w-full pl-3 pt-3 gap-3">
        <div class="h-20 w-64 border border-cerulean-500 rounded-sm">
            <div class="h-8 text-cerulean-500 text-center font-CoconPro">
                User Gesamt
            </div>
            <div class="h-10 text-chathams-blue-800 dark:text-gray-100 text-center font-CoconPro text-4xl">
                {{ $usersCount }}
            </div>
        </div>

        <div class="h-20 w-64 border border-cerulean-500 rounded-sm">
            <div class="h-8 text-cerulean-500 text-center font-CoconPro">
                Zuletzt hinzugefügt
            </div>
            <div class="h-10 text-chathams-blue-800 dark:text-gray-100 text-center font-CoconPro text-2xl">
                {{ $userLastAdded->name }}
            </div>
        </div>





    </div>



    <x-sitetopmenu />

<div class="m-3">
    <x-table.main>
        <x-table.head :labels="['Name', 'Benutzername', 'Rolle', 'Kunde', '', ]" />

        <x-table.body>

            @foreach ($users as $user)

                <x-table.datarow
                    :values="[
                        $user->name,
                        $user->username,
                        $user->role->name,
                        $user->customer ? $user->customer->name : ''
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $user->id }}/edit"
                />

            @endforeach

        </x-table.body>
    </x-table.main>
    <div class="mt-5 mb-10">
        {{ $users->links() }}
    </div>

</div>



</x-admin-layout>
