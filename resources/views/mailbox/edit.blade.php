<x-app-layout :$customer>
    <x-create.main header="E-Mail Postfach bearbeiten" labelsubmit="Ändern" action="{{ route('mailbox.update', [$customer, $mailbox]) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $mailbox->name }}" />

        <x-create.singlerow label="E-Mail Adresse" name="mailAdress" default="{{ $mailbox->mailAdress }}" />

        <x-create.doublerow label1="Benutzername" name1="username" default1="{{ $mailbox->username }}" label2="Passwort" name2="password" default2="{{ $mailbox->password }}" />

        <div class="flex flex-col mt-2">
            <x-input.label for="mailbox_provider_id" value="Anbieter" />
            <x-input.select id="mailbox_provider_id" name="mailbox_provider_id">
                @foreach ($mailboxProviders as $mailboxprovider)
                    <option {{ $mailboxprovider->id == $mailbox->mailboxProvider->id ? 'selected' : '' }} value="{{ $mailboxprovider->id }}">{{ $mailboxprovider->name }}</option>
                @endforeach
            </x-input.select>
        </div>

    </x-create.main>
</x-app-layout>
