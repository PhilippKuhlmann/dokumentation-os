<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Telefon bearbeiten
            </div>
            <form method="post" action="{{ route('phone.update', [$customer, $phone]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="extension" placeholder="Nebenstelle" value="{{ $phone->extension }}" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" value="{{ $phone->manufacturer }}" />
                    <x-input.field name="model" placeholder="Modell" value="{{ $phone->model }}" />
                    <x-input.field name="serialNumber" placeholder="Seriennummer" value="{{ $phone->serialNumber }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip" placeholder="IP-Adresse" value="{{ $phone->ip }}" />
                    <x-input.field name="port" placeholder="Port" value="{{ $phone->port }}" />
                    <x-input.field name="mac" placeholder="MAC-Adresse" value="{{ $phone->mac }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="username" placeholder="Benutzername" value="{{ $phone->username }}" />
                    <x-input.field name="password" placeholder="Passwort" value="{{ $phone->password }}" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-input.button label="Ändern" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
