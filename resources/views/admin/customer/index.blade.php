<x-admin-layout>

    <div class="flex w-full pl-3 pt-3 gap-3">
        <div class="h-20 w-64 border border-cerulean-500 rounded-sm">
            <div class="h-8 text-cerulean-500 text-center font-CoconPro">
                Kunden Gesamt
            </div>
            <div class="h-10 text-chathams-blue-800 dark:text-gray-100 text-center font-CoconPro text-4xl">
                {{ $customersCount }}
            </div>

        </div>

        <div class="h-20 w-64 border border-cerulean-500 rounded-sm">
            <div class="h-8 text-cerulean-500 text-center font-CoconPro">
                Zuletzt hinzugefügt
            </div>
            <div class="h-10 text-chathams-blue-800 dark:text-gray-100 text-center font-CoconPro text-2xl">
                {{ $customerLastAdded->name }}
            </div>

        </div>

    </div>



    <x-sitetopmenu />

<div class="m-3">
    <x-table.main>
        <x-table.head :labels="['Name', 'KD-Nr.', 'URL', '', ]" />

        <x-table.body>

            @foreach ($customers as $customer)

                <x-table.datarow
                    :values="[
                        $customer->name,
                        $customer->customer_number,
                        'url' => '/' . $customer->slug,
                    ]"

                    editUrl="/{{ Request::path() }}/{{ $customer->id }}/edit"
                    can="isAdmin"
                />

            @endforeach

        </x-table.body>
    </x-table.main>
    <div class="mt-5 mb-10">
        {{ $customers->links() }}
    </div>

</div>



</x-admin-layout>
