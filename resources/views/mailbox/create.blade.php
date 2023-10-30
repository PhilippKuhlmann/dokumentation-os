<x-app-layout :$customer>
    <x-create.main header="Neues E-Mail Postfach" action="{{ route('mailbox.store', $customer) }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="E-Mail Adresse" name="mailAdress" />

        <x-create.doublerow label1="Benutzername" name1="username" label2="Passwort" name2="password" />

        <div class="flex flex-col mt-2">
            <x-input.label for="mailbox_provider_id" value="Anbieter" />
            <x-input.select id="mailbox_provider_id" name="mailbox_provider_id">
                @foreach ($mailboxProviders as $mailboxprovider)
                    <option value="{{ $mailboxprovider->id }}">{{ $mailboxprovider->name }}</option>
                @endforeach
            </x-input.select>
        </div>

        <x-create.hidden />

    </x-create.main>
</x-app-layout>
