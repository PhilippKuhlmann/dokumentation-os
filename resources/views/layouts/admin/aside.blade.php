<aside class="hidden md:block fixed  flex-col py-1 bg-white h-screen w-64 dark:bg-gray-800">
    <ul class="mt-1 dark:text-gray-100">

        <x-nav.asideLink activeUrl="{{ request()->is('admin') }}" link="/admin">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Admin Dashboard
        </x-nav.asideLink>

        <x-nav.asideLabel>Server</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->segment(2) == 'serveroperatingsystem' }}" link="/admin/serveroperatingsystem">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Server Betriebsystem
        </x-nav.asideLink>


    </ul>
</aside>
