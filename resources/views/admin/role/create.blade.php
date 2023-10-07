<x-admin-layout>
    <x-create.main header="Neue Rolle" action="{{ route('admin.role.store') }}">

        <x-create.singlerow label="Name" name="name" />

        <x-create.singlerow label="Beschreibung" name="description" />

        @foreach ($permissions as $permission)
            <div class="flex items-center mt-2">
                <input id="checkbox{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox{{ $permission->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->description }}</label>
            </div>
        @endforeach




    </x-create.main>
</x-admin-layout>
