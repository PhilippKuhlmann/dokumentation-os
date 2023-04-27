<x-guest-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center">
        <div>
            <x-svg.logo class="w-24 h-24 p-2 rounded-xl fill-gray-100 bg-blue-600" />
        </div>
        <div class="mt-3 tracking-wide text-2xl font-semibold">
            {{ config('app.name') }}
        </div>
        <div class="mt-6 w-full sm:max-w-md">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input.label for="username" value="Benutzername" />
                    <x-input.field id="username" name="username" class="mt-1 w-full" value="{{ old('username') }}" required autofocus />
                </div>

                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach

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
