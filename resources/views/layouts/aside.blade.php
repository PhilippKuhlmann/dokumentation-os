<div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-800 dark:bg-gray-900 h-full text-white">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-4 space-y-1">

            <x-aside.link href="{{ route('customer.dashboard', $customer) }}" activeUrl="{{ request()->routeIs('customer.dashboard') }}" >
                <x-slot name="icon">
                    <x-svg.home class="w-6 h-6" />
                </x-slot>
                Daschboard
            </x-aside.link>

            <x-aside.heading name="Netzwerk" />

            <x-aside.link href="{{ route('network.index', $customer) }}" activeUrl="{{ request()->routeIs('network.*') }}">
                <x-slot name="icon">
                    <x-svg.settings class="w-6 h-6" />
                </x-slot>
                Netzwerke
            </x-aside.link>

            <x-aside.heading name="Server" />

            <x-aside.link href="{{ route('server.index', $customer) }}" activeUrl="{{ request()->routeIs('server.*') }}">
                <x-slot name="icon">
                    <x-svg.servers class="w-6 h-6" />
                </x-slot>
                Server
            </x-aside.link>

            <x-aside.link href="{{ route('vm.index', $customer) }}" activeUrl="{{ request()->routeIs('vm.*') }}">
                <x-slot name="icon">
                    <x-svg.server class="w-6 h-6" />
                </x-slot>
                VMs
            </x-aside.link>

            <x-aside.heading name="Active Directory" />

            <x-aside.link href="{{ route('aduser.index', $customer) }}" activeUrl="{{ request()->routeIs('aduser.*') }}">
                <x-slot name="icon">
                    <x-svg.user class="w-6 h-6" />
                </x-slot>
                AD-User
            </x-aside.link>

            <x-aside.link href="{{ route('adgroup.index', $customer) }}" activeUrl="{{ request()->routeIs('adgroup.*') }}">
                <x-slot name="icon">
                    <x-svg.group class="w-6 h-6" />
                </x-slot>
                AD-Gruppen
            </x-aside.link>

            <x-aside.heading name="Telefon" />

            <x-aside.link href="{{ route('phoneSystem.index', $customer) }}" activeUrl="{{ request()->routeIs('phoneSystem.*') }}">
                <x-slot name="icon">
                    <x-svg.phone class="w-6 h-6" />
                </x-slot>
                TK-Anlage
            </x-aside.link>

            <x-aside.link href="{{ route('phone.index', $customer) }}" activeUrl="{{ request()->routeIs('phone.*') }}">
                <x-slot name="icon">
                    <x-svg.phone class="w-6 h-6" />
                </x-slot>
                Telefon
            </x-aside.link>

            <x-aside.heading name="Sonstiges" />

            <x-aside.link href="{{ route('file.index', $customer) }}" activeUrl="{{ request()->routeIs('file.*') }}">
                <x-slot name="icon">
                    <x-svg.upload class="w-6 h-6" />
                </x-slot>
                Dateien
            </x-aside.link>

            <x-aside.heading name="Logins" />

            <x-aside.link href="{{ route('loginwebsite.index', $customer) }}" activeUrl="{{ request()->routeIs('loginwebsite.*') }}">
                <x-slot name="icon">
                    <x-svg.link class="w-6 h-6" />
                </x-slot>
                Webseiten
            </x-aside.link>

            <x-aside.heading name="E-Mail" />

            <x-aside.link href="{{ route('mailbox.index', $customer) }}" activeUrl="{{ request()->routeIs('mailbox.*') }}">
                <x-slot name="icon">
                    <x-svg.mail class="w-6 h-6" />
                </x-slot>
                E-Mail Postfächer
            </x-aside.link>

        </ul>
        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2022 by Philipp</p>
    </div>
</div>
