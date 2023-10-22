@props([
    'header',
    'action',
    'labelsubmit' => 'Hinzufügen',
    'right' => '',
])


<div class="md:flex xs:flex-col">
    <form method="post" action="{{ $action }}" class="p-5" enctype="multipart/form-data">
        @csrf

    <div class="md:flex xs:flex-col md:w-128">

        <div class="flex flex-col text-cerulean-950 dark:text-cerulean-500 w-full">
            <div class="text-2xl font-CoconPro">
                {{ $header }}
            </div>




                {{ $slot }}

                <div class="flex flex-row justify-between gap-3 mt-5">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="font-DINPro-bold text-gray-600 hover:text-gray-500 px-4 py-2 text-center">Abbrechen</a>
                    <x-input.button label="{{ $labelsubmit }}" />
                </div>

        </div>
    </div>

    {{ $right }}

    <div class="flex flex-col mt-10 w-full max-w-md:w-96">
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
</form>
</div>
