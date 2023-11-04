<x-admin-layout>
    <x-create.main header="Mail Anbieter bearbeiten" labelsubmit="Ändern" action="{{ route('admin.mailboxprovider.update', $mailboxprovider) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" default="{{ $mailboxprovider->name }}" />

        <x-create.doublerow14 label1="POP3-Server" name1="pop3server" default1="{{ $mailboxprovider->pop3server }}" label2="Port" name2="pop3port" type2="number" default2="{{ $mailboxprovider->pop3port }}" />

        <x-create.doublerow14 label1="IMAP-Server" name1="imapserver" default1="{{ $mailboxprovider->imapserver }}" label2="Port" name2="imapport" type2="number" default2="{{ $mailboxprovider->imapport }}" />

        <x-create.doublerow14 label1="SMTP-Server" name1="smtpserver" default1="{{ $mailboxprovider->smtpserver }}" label2="Port" name2="smtpport" type2="number" default2="{{ $mailboxprovider->smtpport }}" />

    </x-create.main>
</x-admin-layout>
