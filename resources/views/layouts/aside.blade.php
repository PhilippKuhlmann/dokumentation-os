<aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full text-gray-100 bg-sdarkblue sm:translate-x-0 dark:bg-gray-800 "
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sdarkblue dark:bg-gray-800">
            <ul class="space-y-2 mb-8">

                <x-aside.link href="{{ route('customer.dashboard', $customer) }}">
                    <x-slot:svg>
                        <x-svg.home class="h-6 w-6" />
                    </x-slot:svg>
                    Dashboard
                </x-aside.link>

                <x-aside.seperator name="Netzwerk" />

                <x-aside.link href="{{ route('securepointutm.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.fire class="h-6 w-6" />
                    </x-slot:svg>
                    Securepoint UTM
                </x-aside.link>

                <x-aside.link href="{{ route('network.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.settings class="h-6 w-6" />
                    </x-slot:svg>
                    Netzwerke
                </x-aside.link>

                <x-aside.link href="{{ route('wifi.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.wifi class="h-6 w-6" />
                    </x-slot:svg>
                    WLAN
                </x-aside.link>

                <x-aside.seperator name="Server" />

                <x-aside.link href="{{ route('server.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.servers class="h-6 w-6" />
                    </x-slot:svg>
                    Server
                </x-aside.link>

                <x-aside.link href="{{ route('vm.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.server class="h-6 w-6" />
                    </x-slot:svg>
                    <div class="flex justify-between">
                        VMs
                    </div>
                </x-aside.link>

                <x-aside.seperator name="Clients" />

                <x-aside.link href="{{ route('computer.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.computer class="h-6 w-6" />
                    </x-slot:svg>
                    Computer
                </x-aside.link>

                <x-aside.link href="{{ route('printer.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.printer class="h-6 w-6" />
                    </x-slot:svg>
                    Drucker
                </x-aside.link>

                <x-aside.seperator name="AD" />

                <x-aside.link href="{{ route('addomain.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.settings class="h-6 w-6" />
                    </x-slot:svg>
                    AD-Domäne
                </x-aside.link>

                <x-aside.link href="{{ route('aduser.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.user class="h-6 w-6" />
                    </x-slot:svg>
                    AD-User
                </x-aside.link>

                <x-aside.link href="{{ route('adgroup.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.group class="h-6 w-6" />
                    </x-slot:svg>
                    AD-Gruppen
                </x-aside.link>

                <x-aside.seperator name="Telefon" />

                <x-aside.link href="{{ route('phoneSystem.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.phone class="h-6 w-6" />
                    </x-slot:svg>
                    TK-Anlage
                </x-aside.link>

                <x-aside.link href="{{ route('phone.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.phone class="h-6 w-6" />
                    </x-slot:svg>
                    Telefon
                </x-aside.link>

                <x-aside.seperator name="Sonstiges" />

                <x-aside.link href="{{ route('file.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.upload class="h-6 w-6" />
                    </x-slot:svg>
                    Dateien
                </x-aside.link>

                <x-aside.seperator name="Logins" />

                <x-aside.link href="{{ route('loginwebsite.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.link class="h-6 w-6" />
                    </x-slot:svg>
                    Webseiten
                </x-aside.link>

                <x-aside.seperator name="E-Mail" />

                <x-aside.link href="{{ route('mailbox.index', $customer) }}">
                    <x-slot:svg>
                        <x-svg.mail class="h-6 w-6" />
                    </x-slot:svg>
                    E-Mail Postfächer
                </x-aside.link>

            </ul>
        </div>
    </aside>
