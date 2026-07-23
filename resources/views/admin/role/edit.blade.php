<x-admin-layout>
    <x-create.main header="Rolle bearbeiten" labelsubmit="Speichern" action="{{ route('admin.role.update', $role) }}">
        @method('PATCH')

        <x-create.singlerow label="Name" name="name" :default="$role->name" />

        <x-create.singlerow label="Beschreibung" name="description" :default="$role->description" />

        <x-slot:right>
            <x-role.permissions :matrix="$matrix" :others="$others" :actions="$actions" :selected="$selected" />
        </x-slot>

    </x-create.main>
</x-admin-layout>
