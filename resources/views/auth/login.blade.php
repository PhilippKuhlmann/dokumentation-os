<x-guest-layout>

    <div class="min-h-screen flex flex-col p-2 sm:justify-center items-center">
        <div>
            <x-svg.logo class="w-24 h-24 p-2 rounded-xl fill-gray-100 bg-blue-600" />
        </div>
        <div class="mt-3 tracking-wide text-2xl font-semibold">
            {{ config('app.name') }}
        </div>
        <div class="mt-6 w-full sm:max-w-md">
            <form method="POST" action="{{ route('login') }}">
                @csrf


                @foreach ($errors->all() as $error)
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    </div>
                @endforeach

                <div>
                    <x-input.label for="username" value="Benutzername" />
                    <x-input.field id="username" name="username" class="mt-1 w-full" value="{{ old('username') }}" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input.label for="password" value="Passwort" />
                    <x-input.field id="password" type="password" name="password" class="mt-1 w-full" required />
                </div>

                <div class="mt-4">
                    <x-input.checkbox value="Login merken" name="remember" for="remember_me" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <x-input.button label="Anmelden" />
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>
