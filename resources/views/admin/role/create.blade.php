<x-admin-layout>
    <x-create.main header="Neue Rolle" action="{{ route('admin.role.store') }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Beschreibung" name="description" />

        <x-slot:right>
            <x-role.permissions :matrix="$matrix" :others="$others" :actions="$actions" />
        </x-slot>

    </x-create.main>
</x-admin-layout>
