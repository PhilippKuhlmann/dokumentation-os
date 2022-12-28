<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Drucker bearbeiten
            </div>
            <form method="post" action="{{ route('printer.update', [$customer, $printer]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="name" placeholder="Name" value="{{ $printer->name }}" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" value="{{ $printer->manufacturer }}" />
                    <x-input.field name="model" placeholder="Modell" value="{{ $printer->model }}" />
                    <x-input.field name="serialNumber" placeholder="Seriennummer" value="{{ $printer->serialNumber }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip" placeholder="IP-Adresse" value="{{ $printer->ip }}" />
                    <x-input.field name="port" placeholder="Port" value="{{ $printer->port }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="username" placeholder="Benutzername" value="{{ $printer->username }}" />
                    <x-input.field name="password" placeholder="Passwort" value="{{ $printer->password }}" />
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
