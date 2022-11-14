<x-empty-layout>
    <div class="flex h-screen justify-center items-center">
        <div class=" w-full sm:w-96 md:w-1/2 sm:rounded-md sm:shadow-2xl p-5 bg-white
                      dark:bg-gray-800">

            <div class="text-center">
                <form method="GET" action="/customer/search"
                class="flex" >
                    @csrf
                    <input type="text" name="search"
                        placeholder="Kundensuche"
                        value="{{ request('search') }}"
                        class="border-1 border-r-0 rounded-l-md border-gray-200 w-full py-2 px-3
                                dark:bg-gray-700 dark:text-gray-100 dark:border-gray-500 focus:outline-offset-3
                                border-none focus:ring-0"
                        required autofocus
                    />

                    <button type="submit"
                        class="bg-blue-700 py-2 px-8 rounded-r-md text-white hover:bg-blue-600 focus:bg-blue-600">
                        Suchen
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-empty-layout>
