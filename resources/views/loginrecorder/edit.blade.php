<x-app-layout :$customer>
    <x-create.main header="Login für NAS bearbeiten" labelsubmit="Speichern" action="{{ route('loginnas.update', [$customer, $loginnas]) }}">
        @method('PATCH')

        <x-edit.select.nas selector="{{ $loginnas->nas->id }}" :$nas/>

        <x-create.doublerow label1="Benutzer" name1="username" default1="{{ $loginnas->username }}" label2="Passwort" name2="password" default2="{{ $loginnas->password }}" />

        <x-create.singlerow label="Beschreibung" name="description" default="{{ $loginnas->description }}" />

        @can('see_hidden')
            <div class="flex items-center mt-2">
                <input {{ $aduser->hidden ? 'checked' : '' }} id="checkbox_hidden" type="checkbox" name="hidden" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox_hidden" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Verstecken</label>
            </div>
        @endcan

    </x-create.main>

    @can('loginnas_delete')
        <x-deletecard action="{{ route('loginnas.destroy', [$customer, $loginnas]) }}" />
    @endcan

</x-app-layout>

