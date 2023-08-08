<aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-100 bg-sdarkblue sm:translate-x-0 dark:bg-gray-900 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sdarkblue dark:bg-gray-900">
            <ul class="space-y-2">

                <form method="post" action="{{ route('filter.site', $customer) }}">
                    @csrf
                    <div class="flex flex-col">
                        <div class="">
                            <x-input.label value="Standort" />
                        </div>
                        <div class="flex gap-2">
                            <x-input.select name="site" class="w-full">
                                <option value="all">Alle</option>
                                @foreach ($customer->sites as $site)
                                    <option value="{{ $site->id }}" {{ $site->id == session()->get('site') ? 'selected' : '' }}>{{ $site->name }}</option>
                                @endforeach
                            </x-input.select>
                            <x-input.button label="Filtern" />
                        </div>
                    </div>
                </form>

                <x-aside.dropdown label="Kunde" svg="svg.office" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Standort" href="{{ route('site.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                <x-aside.dropdown label="Netzwerk" svg="svg.wifi" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Securepoint UTM" href="{{ route('securepointutm.index', $customer) }}" />
                        <x-aside.dropdownlink label="Router" href="{{ route('router.index', $customer) }}" />
                        <x-aside.dropdownlink label="VLAN" href="{{ route('network.index', $customer) }}" />
                        <x-aside.dropdownlink label="WLAN" href="{{ route('wifi.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Server" svg="svg.servers" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Server" href="{{ route('server.index', $customer) }}" />
                        <x-aside.dropdownlink label="VMs" href="{{ route('vm.index', $customer) }}" />
                        <x-aside.dropdownlink label="NAS" href="{{ route('nas.index', $customer) }}" />
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

                 <x-aside.dropdown label="Logins" svg="svg.login" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Allgemein" href="{{ route('logingeneral.index', $customer) }}" />
                        <x-aside.dropdownlink label="Webseiten" href="{{ route('loginwebsite.index', $customer) }}" />
                        <x-aside.dropdownlink label="NAS" href="{{ route('loginnas.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="E-Mail" svg="svg.mail" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="Securepoint UMA" href="{{ route('securepointuma.index', $customer) }}" />
                        <x-aside.dropdownlink label="E-Mail Postfächer" href="{{ route('mailbox.index', $customer) }}" />
                    </x-slot:links>
                 </x-aside.dropdown>

                 <x-aside.dropdown label="Dienste" svg="svg.settings" >
                    <x-slot:links>
                        <x-aside.dropdownlink label="FTP-Server" href="{{ route('ftpserver.index', $customer) }}" />
                        <x-aside.dropdownlink label="DynDNS" href="{{ route('dyndns.index', $customer) }}" />
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
