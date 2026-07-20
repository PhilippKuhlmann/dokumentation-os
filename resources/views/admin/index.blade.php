<x-admin-layout>

    <div class="p-3 sm:p-5">
        <div class="text-3xl font-CoconPro text-gray-900 dark:text-gray-100 mb-5">
            Administration
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach ($tiles as $tile)
                <a href="{{ $tile['route'] }}"
                    class="group flex items-center gap-3 p-4 bg-white rounded-xl border border-gray-200 shadow-sm transition hover:border-cerulean-300 hover:shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:border-cerulean-500">
                    <span class="flex items-center justify-center w-11 h-11 rounded-lg bg-cerulean-50 text-cerulean-600 transition-colors group-hover:bg-cerulean-100 dark:bg-gray-700 dark:text-cerulean-400 shrink-0">
                        <x-dynamic-component :component="$tile['icon']" class="w-6 h-6" />
                    </span>
                    <span class="flex flex-col">
                        <span class="text-2xl font-bold leading-none text-chathams-blue-800 dark:text-gray-100">{{ $tile['count'] }}</span>
                        <span class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $tile['label'] }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>

</x-admin-layout>
