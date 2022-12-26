<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-900">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Neues E-Mail Postfach
            </div>
            <form method="post" action="{{ route('mailbox.store', $customer) }}" class="p-5">
                @csrf

                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="name" placeholder="Name" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="mailAdress" placeholder="E-Mail Adresse" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-input.field name="username" placeholder="Benutzername" />
                    <x-input.field name="password" placeholder="Passwort" />
                </div>
                <div class="flex flex-col gap-3 mb-3">
                    <x-input.label for="mailbox_provider_id" value="Anbieter" />
                    <x-input.select id="mailbox_provider_id" name="mailbox_provider_id">
                        @foreach ($mailboxProviders as $mailboxprovider)
                            <option value="{{ $mailboxprovider->id }}">{{ $mailboxprovider->name }}</option>
                        @endforeach
                    </x-input.select>
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
