<x-empty-layout>
    <div class="flex h-screen justify-center items-center">
        <div class=" w-full sm:w-96 sm:rounded-xl sm:shadow-2xl p-5 bg-white dark:bg-gray-800">
            <x-svg.logo class="w-32 h-32 mx-auto" />
            <h1 class="mt-5 text-2xl text-center dark:text-gray-100">
                {{ config('app.name') }}
            </h1>
            <div class="text-center">
                <form method="POST" action="{{ route('login') }}" >
                    @csrf

                    <x-inputs.field
                        name="username"
                        placeholder="Benutzername"
                        value="{{ old('username') }}"
                        class="w-full mt-5"
                        required
                        autofocus
                    />

                    <x-inputs.field
                        type="password"
                        name="password"
                        placeholder="Passwort"
                        class="w-full mt-5"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error :messages="$errors->get('username')" class="mt-3" />

                    <x-inputs.button label="Login" class="mt-5 px-10" />
                </form>
            </div>
        </div>
    </div>
</x-empty-layout>
