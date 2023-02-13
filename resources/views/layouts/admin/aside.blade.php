<div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-800 dark:bg-gray-900 h-full text-white">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-4 space-y-1">

            <x-aside.link href="{{ route('admin.daschboard') }}" activeUrl="{{ request()->routeIs('admin.daschboard') }}" >
                <x-slot name="icon">
                    <x-svg.home class="w-6 h-6" />
                </x-slot>
                Daschboard
            </x-aside.link>

            <x-aside.heading name="Kunden" />

            <x-aside.link href="{{ route('admin.customer.index') }}" activeUrl="{{ request()->routeIs('admin.customer.*') }}">
                <x-slot name="icon">
                    <x-svg.settings class="w-6 h-6" />
                </x-slot>
                Kunden
            </x-aside.link>

            <x-aside.heading name="Server" />

            <x-aside.link href="{{ route('admin.server.operatingsystem') }}" activeUrl="{{ request()->routeIs('admin.server.operatingsystem') }}">
                <x-slot name="icon">
                    <x-svg.settings class="w-6 h-6" />
                </x-slot>
                Server Betriebsystem
            </x-aside.link>

    </ul>
    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2022 by Philipp</p>
</div>
</div>
