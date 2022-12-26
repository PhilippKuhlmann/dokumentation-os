<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neue Telefonanlage
            </div>
            <form method="post" action="{{ route('phoneSystem.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" autofocus/>
                    <x-input.field name="type" placeholder="Typ" />
                    <x-input.field name="model" placeholder="Modell" />
                    <x-input.field name="serialNumber" placeholder="Seriennummer" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip1" placeholder="IP 1" />
                    <x-input.field name="ip2" placeholder="IP 2" />
                    <x-input.field name="ip3" placeholder="IP 3" />
                    <x-input.field name="port" placeholder="Port" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="username" placeholder="Benutzername" />
                    <x-input.field name="password" placeholder="Passwort" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-input.button label="Hinzufügen" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
