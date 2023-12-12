<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">


        <div class="w-full sm:max-w-md mt-6 px-6 p-4 bg-white shadow-md overflow-hidden sm:rounded-sm">

            <div class="flex flex-col justify-center items-center">
                <img src="/images/icon_stadel.png" class="w-32 h-32">
                <span class="mb-10 text-4xl text-chathams-blue-800 font-CoconPro">
                    {{ config('app.name'); }}
                </span>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input.error :messages="$errors->get('username')" class="mb-2 font-DINPro-bold" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input.label class="text-gray-900" for="username" :value="__('Benutzername')" />
                    <x-input.text id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required autofocus autocomplete="username" />

                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input.label class="text-gray-900" for="password" :value="__('Passwort')" />

                    <x-input.text id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />


                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-blau-100 shadow-sm focus:ring-sdarkblue"
                            name="remember">
                        <span class="ml-2 text-sm">{{ __('Login merken') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-input.button label="Anmelden" />
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
