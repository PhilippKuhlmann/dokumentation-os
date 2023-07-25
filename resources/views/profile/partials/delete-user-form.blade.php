<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Konto Löschen') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Nach dem Löschen des Kontos hast du keinen Zugriff mehr auf deine Daten!') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Konto Löschen') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Bist du sicher?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Nach dem Löschen des Kontos hast du keinen Zugriff mehr auf deine Daten!') }}
            </p>

            <div class="mt-6">
                <x-input.label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-input.text
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Abbrechen') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Konto Löschen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
