<div class="flex w-full p-2 gap-3">

    <x-input.linkbutton label="Zurück" link="{{ url()->previous() }}" color="gray" />

        {{ $slot }}

</div>
