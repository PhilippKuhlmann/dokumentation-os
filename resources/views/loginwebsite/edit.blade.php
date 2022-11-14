<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-800">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Edit Webseiten Login
            </div>
            <form method="post" action="{{ route('loginwebsite.update', [$customer, $loginwebsite]) }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="name" placeholder="Name" value="{{ $loginwebsite->name }}" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="username" placeholder="Benutzername" value="{{ $loginwebsite->username }}" />
                    <x-inputs.field name="password" placeholder="Passwort" value="{{ $loginwebsite->password }}"/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="url" placeholder="URL" value="{{ $loginwebsite->url }}" />
                </div>
                <div class="flex flex-row gap-3">
                    <x-inputs.button label="Ändern" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
