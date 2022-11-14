<div class="flex w-full p-2 gap-3">

    <x-inputs.linkbutton label="Zurück" link="{{ url()->previous() }}" color="gray" />

        {{ $slot }}

</div>
