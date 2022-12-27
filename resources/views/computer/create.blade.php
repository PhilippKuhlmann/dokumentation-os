<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neuer Computer
            </div>
            <form method="post" action="{{ route('computer.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="name" placeholder="Name" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="manufacturer" placeholder="Hersteller" />
                    <x-input.field name="model" placeholder="Modell"/>
                    <x-input.field name="serialNumber" placeholder="Seriennummer"/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="ip" placeholder="IP-Adresse" />
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="operatingSystem" placeholder="Betriebsystem" />
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
