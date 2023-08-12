<x-app-layout :$customer>

    <form method="POST" action="/{{ $customer->slug }}/file" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-row gap-3 p-3">
            <x-input.file id="file" name="file" class="w-96" />
            <x-input.field name="name" placeholder="Dateiname" />
            <x-input.button label="Hochladen" />
        </div>
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

                    />

                @endforeach

            </x-table.body>
        </x-table.main>
    </div>

</x-app-layout>
