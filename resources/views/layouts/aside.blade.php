<aside class="hidden md:block fixed  flex-col py-1 bg-white h-screen w-64 dark:bg-gray-800">
    <ul class="mt-1 dark:text-gray-100">

        <x-nav.asideLink activeUrl="{{ request()->routeIs('customer.dashboard') }}" link="{{ route('customer.dashboard', [$customer]) }}">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Dashboard
        </x-nav.asideLink>

        <x-nav.asideLabel>Netzwerk</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('network.*') }}" link="{{ route('network.index', [$customer]) }}">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Netzwerke
        </x-nav.asideLink>

        <x-nav.asideLabel>Server</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('server.*') }}" link="{{ route('server.index', [$customer]) }}">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Server
        </x-nav.asideLink>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('vm.*') }}" link="{{ route('vm.index', [$customer]) }}">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            VMs
        </x-nav.asideLink>

        <x-nav.asideLabel>Active Directory</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('aduser.*') }}" link="{{ route('aduser.index', [$customer]) }}">
            <x-slot:icon><x-svg.person class="w-6 h-6" /></x-slot>
            AD-User
        </x-nav.asideLink>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('adgroup.*') }}" link="{{ route('adgroup.index', [$customer]) }}">
            <x-slot:icon><x-svg.group class="w-6 h-6" /></x-slot>
            AD-Gruppen
        </x-nav.asideLink>

        <x-nav.asideLabel>Sonstiges</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('file.*') }}" link="{{ route('file.index', [$customer]) }}">
            <x-slot:icon><x-svg.folder class="w-6 h-6" /></x-slot>
            Dateien
        </x-nav.asideLink>

        <x-nav.asideLabel>Logins</x-nav.asideLabel>

        <x-nav.asideLink activeUrl="{{ request()->routeIs('loginwebsite.*') }}" link="{{ route('loginwebsite.index', [$customer]) }}">
            <x-slot:icon><x-svg.settings class="w-6 h-6" /></x-slot>
            Webseiten
        </x-nav.asideLink>



    </ul>
</aside>
