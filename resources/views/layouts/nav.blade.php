<div class="fixed w-full flex items-center justify-between h-14 text-white z-10 bg-blue-800 dark:bg-gray-900">

    <div class="flex items-center justify-start md:justify-center w-14 md:w-64 h-14">
        <x-svg.logo class="h-8 w-8 fill-gray-100" />
        <span class="hidden md:block ml-4">{{ config('app.name') }}</span>
    </div>

    @cannot('isCustomer')
        <x-input.customersearch class="w-96 hidden md:block" value="{{ $customer->name }}" />
    @endcannot


    <div class="flex my-auto mr-3">
        <div id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
            data-dropdown-placement="bottom-start"
            class="overflow-hidden relative w-8 h-8 bg-gray-100 rounded-full dark:bg-gray-600 cursor-pointer">
            <svg class="absolute -left-1 w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>

        <!-- Dropdown menu -->
        <div id="userDropdown"
            class="hidden z-50 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 438px);"
            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom-start">
            <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                <div>{{ auth()->user()->name }}</div>
            </div>

            <div class="py-1">
                <form action="{{ route('logout') }}" method="POST"
                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>





