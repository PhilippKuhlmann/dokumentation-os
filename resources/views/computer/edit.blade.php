<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Computer bearbeiten
            </div>
            <form method="post" action="{{ route('computer.update', [$customer, $computer]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="name" placeholder="Name" value="{{ $computer->name }}" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" value="{{ $computer->manufacturer }}" />
                    <x-input.field name="model" placeholder="Modell" value="{{ $computer->model }}" />
                    <x-input.field name="serialNumber" placeholder="Seriennummer" value="{{ $computer->serialNumber }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip" placeholder="IP-Adresse" value="{{ $computer->ip }}" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="operatingSystem" placeholder="Betriebsystem" value="{{ $computer->operatingSystem }}" />
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
