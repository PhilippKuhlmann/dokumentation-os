<x-admin-layout>
    <x-create.main header="Neuer Mailanbieter" action="{{ route('admin.mailboxprovider.store') }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.doublerow14 label1="POP3-Server" name1="pop3server" label2="Port" name2="pop3port" type2="number" />

        <x-create.doublerow14 label1="IMAP-Server" name1="imapserver" label2="Port" name2="imapport" type2="number" />

        <x-create.doublerow14 label1="SMTP-Server" name1="smtpserver" label2="Port" name2="smtpport" type2="number" />

    </x-create.main>
</x-admin-layout>
