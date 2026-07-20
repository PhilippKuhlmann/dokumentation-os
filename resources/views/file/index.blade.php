<x-app-layout :$customer>

    <form method="POST" action="/{{ $customer->slug }}/file" enctype="multipart/form-data">
        @csrf

        @can('file_create')
            <div class="flex flex-row gap-3 p-3">
                <x-input.file id="file" name="file" class="w-96" />
                <x-input.field name="name" placeholder="Dateiname" required />
                <x-input.button label="Hochladen" />
            </div>
        @endcan

    </form>



    <div class="m-3">
        <x-table.main>
            <x-table.head :labels="['Name', '', 'Datum', '', ]" />

            <x-table.body>

                @foreach ($files as $file)

                    <x-table.datarow
                        :values="[
                            $file->name . '.' . $file->extension,
                            'download' =>  '/' . $customer->slug . '/file/' . $file->id,
                            $file->created_at->diffForHumans()
                        ]"
                        delUrl="{{ route('file.destroy', [$customer, $file]) }}"
                        can="file_update"
                        canDel="file_delete"

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

    <div class="px-3 pb-3">
        {{ $files->links() }}
    </div>

</x-app-layout>
