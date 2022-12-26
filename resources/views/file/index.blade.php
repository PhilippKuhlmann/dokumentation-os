<x-app-layout :$customer>


    <div class="p-3">
        <div class="w-full p-3 rounded-md dark:text-gray-100 bg-white dark:bg-gray-800">
            <form method="POST" action="/{{ $customer->slug }}/file" enctype="multipart/form-data">
                @csrf



                <div class="flex flex-row gap-3 p-3 bg-gray-900">
                    <x-input.file id="file" name="file" class="w-96" />
                    <x-input.field name="name" placeholder="Dateiname" />
                    <x-input.button label="Hochladen" />
                </div>
            </form>
        </div>



        <div class="flex flex-wrap mt-8 gap-3">
            @foreach ($customer->files as $file)
                <div class="w-48 rounded-md shadow-md dark:text-gray-100  bg-white dark:bg-gray-900">
                    <div class="text-right pr-1">
                        <form method="POST" action="/{{ $customer->slug }}/file/{{ $file->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">X</button>
                        </form>
                    </div>

                    <a href="/{{ $customer->slug }}/file/{{ $file->id }}" class="hover:text-blue-600">
                        <div class="">
                            <svg width="80" height="80" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="fill-current">
                                <path d="M19 9H15V3H9V9H5L12 16L19 9ZM5 18V20H19V18H5Z" />
                            </svg>
                        </div>
                        <div class="m-3 text-sm">
                            {{ $file->name . '.' . $file->extension }}
                        </div>
                        <div class="m-3 text-xs">
                            {{ $file->created_at->diffForHumans() }}
                        </div>

                    </a>
                </div>
            @endforeach
        </div>





    </div>







</x-app-layout>
