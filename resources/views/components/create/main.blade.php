@props([
    'header',
    'action',
    'labelsubmit' => 'Hinzufügen'
])


<div class="md:flex xs:flex-col">

    <div class="md:flex xs:flex-col md:w-128">

        <div class="flex flex-col text-gray-100 w-full">
            <div class="text-2xl pl-5 mt-5">
                {{ $header }}
            </div>

            <form method="post" action="{{ $action }}" class="p-5">
                @csrf

                {{ $slot }}

                <div class="flex flex-row justify-between gap-3 mt-5">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded-md text-center">Abbrechen</a>
                    <x-input.button label="{{ $labelsubmit }}" />
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-col mt-10 w-full max-w-md:w-96">
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
</div>
