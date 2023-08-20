<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-100 bg-sdarkblue sm:translate-x-0 dark:bg-gray-900 " aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-sdarkblue dark:bg-gray-900">
        <ul class="space-y-2">

            <x-aside.dropdown label="Kunden" svg="svg.office" >
                <x-slot:links>
                    <x-aside.dropdownlink label="Kunden" href="{{ route('admin.customer.index') }}" />
                </x-slot:links>
            </x-aside.dropdown>

            <x-aside.dropdown label="Clients" svg="svg.computer" >
                <x-slot:links>
                    <x-aside.dropdownlink label="Betriebsysteme" href="{{ route('admin.operatingsystem') }}" />
                </x-slot:links>
            </x-aside.dropdown>

        </ul>
    </div>
</aside>




