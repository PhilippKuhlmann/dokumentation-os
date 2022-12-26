<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Telefonanlage bearbeiten
            </div>
            <form method="post" action="{{ route('phoneSystem.update', [$customer, $phoneSystem]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" value="{{ $phoneSystem->manufacturer }}" autofocus/>
                    <x-input.field name="type" placeholder="Typ" value="{{ $phoneSystem->type }}" />
                    <x-input.field name="model" placeholder="Modell" value="{{ $phoneSystem->model }}" />
                    <x-input.field name="serialNumber" placeholder="Seriennummer" value="{{ $phoneSystem->serialNumber }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip1" placeholder="IP 1" value="{{ $phoneSystem->ip1 }}" />
                    <x-input.field name="ip2" placeholder="IP 2" value="{{ $phoneSystem->ip2 }}" />
                    <x-input.field name="ip3" placeholder="IP 3" value="{{ $phoneSystem->ip3 }}" />
                    <x-input.field name="port" placeholder="Port" value="{{ $phoneSystem->port }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="username" placeholder="Benutzername" value="{{ $phoneSystem->username }}" />
                    <x-input.field name="password" placeholder="Passwort" value="{{ $phoneSystem->password }}" />
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
