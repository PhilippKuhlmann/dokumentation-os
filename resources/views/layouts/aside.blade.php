<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-900 bg-white sm:translate-x-0 dark:bg-gray-900 " aria-label="Sidebar">
    <div class="flex justify-between flex-col h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-900">
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
                                <option value="{{ $site->id }}"
                                    {{ $site->id == session()->get('site') ? 'selected' : '' }}>{{ $site->name }}
                                </option>
                            @endforeach
                        </x-input.select>
                        <x-input.button label="Filtern" />
                    </div>
                </div>
            </form>

            @canany(['site_viewAny', 'contactperson_viewAny'])
                <x-aside.dropdown label="Kunde" svg="svg.office">
                    <x-slot:links>
                        @can('site_viewAny')
                            <x-aside.dropdownlink label="Standort" href="{{ route('site.index', $customer) }}" />
                        @endcan
                        @can('contactperson_viewAny')
                            <x-aside.dropdownlink label="Ansprechpartner" href="{{ route('contactperson.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['securepointutm_viewAny', 'router_viewAny', 'network_viewAny', 'wifi_viewAny'])
                <x-aside.dropdown label="Netzwerk" svg="svg.wifi">
                    <x-slot:links>
                        @can('securepointutm_viewAny')
                            <x-aside.dropdownlink label="Securepoint UTM"
                                href="{{ route('securepointutm.index', $customer) }}" />
                        @endcan
                        @can('router_viewAny')
                            <x-aside.dropdownlink label="Router" href="{{ route('router.index', $customer) }}" />
                        @endcan
                        @can('network_viewAny')
                            <x-aside.dropdownlink label="VLAN" href="{{ route('network.index', $customer) }}" />
                        @endcan
                        @can('wifi_viewAny')
                            <x-aside.dropdownlink label="WLAN" href="{{ route('wifi.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['server_viewAny', 'vm_viewAny', 'nas_viewAny'])
                <x-aside.dropdown label="Server" svg="svg.servers">
                    <x-slot:links>
                        @can('server_viewAny')
                            <x-aside.dropdownlink label="Server" href="{{ route('server.index', $customer) }}" />
                        @endcan
                        @can('vm_viewAny')
                            <x-aside.dropdownlink label="VMs" href="{{ route('vm.index', $customer) }}" />
                        @endcan
                        @can('nas_viewAny')
                            <x-aside.dropdownlink label="NAS" href="{{ route('nas.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['computer_viewAny', 'printer_viewAny', 'iotdevice_viewAny', 'machine_viewAny', 'otherclient_viewAny'])
                <x-aside.dropdown label="Clients" svg="svg.computer">
                    <x-slot:links>
                        @can('computer_viewAny')
                            <x-aside.dropdownlink label="Computer" href="{{ route('computer.index', $customer) }}" />
                        @endcan
                        @can('printer_viewAny')
                            <x-aside.dropdownlink label="Drucker" href="{{ route('printer.index', $customer) }}" />
                        @endcan
                        @can('iotdevice_viewAny')
                            <x-aside.dropdownlink label="IoT-Gerät" href="{{ route('iotdevice.index', $customer) }}" />
                        @endcan
                        @can('machine_viewAny')
                            <x-aside.dropdownlink label="Maschinen" href="{{ route('machine.index', $customer) }}" />
                        @endcan
                        @can('otherclient_viewAny')
                            <x-aside.dropdownlink label="Sonstige" href="{{ route('otherclient.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['addomain_viewAny', 'aduser_viewAny', 'adgroup_viewAny'])
                <x-aside.dropdown label="AD" svg="svg.user">
                    <x-slot:links>
                        @can('addomain_viewAny')
                            <x-aside.dropdownlink label="AD-Domäne" href="{{ route('addomain.index', $customer) }}" />
                        @endcan
                        @can('aduser_viewAny')
                            <x-aside.dropdownlink label="AD-User" href="{{ route('aduser.index', $customer) }}" />
                        @endcan
                        @can('adgroup_viewAny')
                            <x-aside.dropdownlink label="AD-Gruppen" href="{{ route('adgroup.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['phonesystem_viewAny', 'phone_viewAny', 'dect_viewAny'])
                <x-aside.dropdown label="Telefon" svg="svg.phone">
                    <x-slot:links>
                        @can('phonesystem_viewAny')
                            <x-aside.dropdownlink label="TK-Anlage" href="{{ route('phoneSystem.index', $customer) }}" />
                        @endcan
                        @can('phone_viewAny')
                            <x-aside.dropdownlink label="Telefon" href="{{ route('phone.index', $customer) }}" />
                        @endcan
                        @can('dect_viewAny')
                            <x-aside.dropdownlink label="DECT" href="{{ route('dect.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['logingeneral_viewAny', 'loginwebsite_viewAny', 'loginnas_viewAny', 'loginrecorder_viewAny'])
                <x-aside.dropdown label="Logins" svg="svg.login">
                    <x-slot:links>
                        @can('logingeneral_viewAny')
                            <x-aside.dropdownlink label="Allgemein" href="{{ route('logingeneral.index', $customer) }}" />
                        @endcan
                        @can('loginwebsite_viewAny')
                            <x-aside.dropdownlink label="Webseiten" href="{{ route('loginwebsite.index', $customer) }}" />
                        @endcan
                        @can('loginnas_viewAny')
                            <x-aside.dropdownlink label="NAS" href="{{ route('loginnas.index', $customer) }}" />
                        @endcan
                        @can('loginrecorder_viewAny')
                            <x-aside.dropdownlink label="Recorder" href="{{ route('loginrecorder.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['securepointuma_viewAny', 'mailbox_viewAny'])
                <x-aside.dropdown label="E-Mail" svg="svg.mail">
                    <x-slot:links>
                        @can('securepointuma_viewAny')
                           <x-aside.dropdownlink label="Securepoint UMA" href="{{ route('securepointuma.index', $customer) }}" />
                        @endcan
                        @can('mailbox_viewAny')
                           <x-aside.dropdownlink label="E-Mail Postfächer" href="{{ route('mailbox.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['recorder_viewAny', 'camera_viewAny'])
                <x-aside.dropdown label="Kamera" svg="svg.cam">
                    <x-slot:links>
                        @can('recorder_viewAny')
                            <x-aside.dropdownlink label="Recorder" href="{{ route('recorder.index', $customer) }}" />
                        @endcan
                        @can('camera_viewAny')
                            <x-aside.dropdownlink label="Kamera" href="{{ route('camera.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['licensewindows_viewAny','licenseaccess_viewAny' , 'licensesoftware_viewAny'])
                <x-aside.dropdown label="Lizenzen" svg="svg.document">
                    <x-slot:links>
                        @can('licensewindows_viewAny')
                            <x-aside.dropdownlink label="Windows" href="{{ route('licensewindows.index', $customer) }}" />
                        @endcan
                        @can('licenseaccess_viewAny')
                            <x-aside.dropdownlink label="CAL" href="{{ route('licenseaccess.index', $customer) }}" />
                        @endcan
                        @can('licensesoftware_viewAny')
                            <x-aside.dropdownlink label="Software" href="{{ route('licensesoftware.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['ftpserver_viewAny', 'dyndns_viewAny'])
                <x-aside.dropdown label="Dienste" svg="svg.settings">
                    <x-slot:links>
                        @can('ftpserver_viewAny')
                            <x-aside.dropdownlink label="FTP-Server" href="{{ route('ftpserver.index', $customer) }}" />
                        @endcan
                        @can('dyndns_viewAny')
                            <x-aside.dropdownlink label="DynDNS" href="{{ route('dyndns.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany

            @canany(['file_viewAny'])
                <x-aside.dropdown label="Sonstiges" svg="svg.settings">
                    <x-slot:links>
                        @can('file_viewAny')
                            <x-aside.dropdownlink label="Dateien" href="{{ route('file.index', $customer) }}" />
                        @endcan
                    </x-slot:links>
                </x-aside.dropdown>
            @endcanany



        </ul>
        <a href="{{ route('changelog') }}" target="_blank" class="mt-10 text-center text-gray-700">
            v{{ $version }}
        </a>
    </div>
</aside>
