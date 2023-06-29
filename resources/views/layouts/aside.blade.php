<aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-100 bg-sdarkblue sm:translate-x-0 dark:bg-gray-900 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sdarkblue dark:bg-gray-900">
            <ul class="space-y-2">

                <x-aside.dropdown label="Netzwerk" svg="svg.wifi" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Securepoint UTM" href="{{ route('securepointutm.index', $customer) }}" />
                        <x-aside.dropdownlink label="Netzwerk" href="{{ route('network.index', $customer) }}" />
                        <x-aside.dropdownlink label="WLAN" href="{{ route('wifi.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Server" svg="svg.servers" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Server" href="{{ route('server.index', $customer) }}" />
                        <x-aside.dropdownlink label="VMs" href="{{ route('vm.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Clients" svg="svg.computer" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Computer" href="{{ route('computer.index', $customer) }}" />
                        <x-aside.dropdownlink label="Drucker" href="{{ route('printer.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="AD" svg="svg.user" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="AD-Domäne" href="{{ route('addomain.index', $customer) }}" />
                        <x-aside.dropdownlink label="AD-User" href="{{ route('aduser.index', $customer) }}" />
                        <x-aside.dropdownlink label="AD-Gruppen" href="{{ route('adgroup.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Telefon" svg="svg.phone" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="TK-Anlage" href="{{ route('phoneSystem.index', $customer) }}" />
                        <x-aside.dropdownlink label="Telefon" href="{{ route('phone.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Logins" svg="svg.link" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Webseiten" href="{{ route('loginwebsite.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="E-Mail" svg="svg.mail" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Securepoint UMA" href="{{ route('securepointuma.index', $customer) }}" />
                        <x-aside.dropdownlink label="E-Mail Postfächer" href="{{ route('mailbox.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Sonstiges" svg="svg.settings" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Dateien" href="{{ route('file.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>



            </ul>
        </div>
    </aside>
