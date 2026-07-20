<x-app-layout :$customer>
    <x-create.main header="Login für NAS bearbeiten" labelsubmit="Speichern" action="{{ route('loginnas.update', [$customer, $loginnas]) }}">
        @method('PATCH')

        <x-edit.select.nas selector="{{ $loginnas->nas->id }}" :$nas/>

        <x-create.doublerow label1="Benutzer" name1="username" :default1="$loginnas->username" label2="Passwort" name2="password" :default2="$loginnas->password" />

        <x-create.singlerow label="Beschreibung" name="description" :default="$loginnas->description" />

        <x-edit.hidden hidden="{{ $loginnas->hidden }}" />

    </x-create.main>

    @can('loginnas_delete')
        <x-deletecard action="{{ route('loginnas.destroy', [$customer, $loginnas]) }}" />
    @endcan

</x-app-layout>

