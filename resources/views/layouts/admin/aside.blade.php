<aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-900 bg-white sm:translate-x-0 dark:bg-gray-900 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-900">
            <ul class="space-y-2">

            <x-aside.dropdown label="Allgemein" svg="svg.office" >
                <x-slot:links>
                    <x-aside.dropdownlink label="Benutzer" href="{{ route('admin.user.index') }}" />
                    <x-aside.dropdownlink label="Kunden" href="{{ route('admin.customer.index') }}" />
                </x-slot:links>
            </x-aside.dropdown>

            <x-aside.dropdown label="Auswahlmenüs" svg="svg.computer" >
                <x-slot:links>
                    <x-aside.dropdownlink label="Betriebsysteme" href="{{ route('admin.operatingsystem.index') }}" />
                </x-slot:links>
            </x-aside.dropdown>

        </ul>
    </div>
</aside>




