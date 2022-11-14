<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-800">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neue Webseiten Login
            </div>
            <form method="post" action="{{ route('loginwebsite.store', [$customer]) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="name" placeholder="Name" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="username" placeholder="Benutzername" />
                    <x-inputs.field name="password" placeholder="Passwort"/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="url" placeholder="URL" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-inputs.button label="Hinzufügen" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
