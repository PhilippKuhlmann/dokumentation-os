<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="flex flex-col justify-center items-center">
            <img src="/images/icon_stadel-weiss.png" class="w-32 h-32">
            <span class="text-4xl text-gray-100">
                {{ config('app.name') }}
            </span>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input.label for="username" :value="__('Benutzername')"  class="text-gray-900" />
                    <x-input.text id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required autofocus autocomplete="username" />
                    <x-input.error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input.label for="password" :value="__('Passwort')" class="text-gray-900" />

                    <x-input.text id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input.error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text- shadow-sm focus:ring-sdarkblue"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Login merken') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-3">
                        {{ __('Anmelden') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
