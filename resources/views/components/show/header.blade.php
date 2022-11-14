@props(['editUrl', 'deleteUrl'])

<div class="flex w-full items-center justify-between p-3">
    <div class="w-full text-2xl dark:text-gray-100">
        {{ $slot }}
    </div>
    <div class="flex items-center gap-3">
        <x-inputs.linkbutton label="Bearbeiten" link="{{ $editUrl }}" />
        <x-inputs.deletebutton link="{{ $deleteUrl }}" />
    </div>
</div>
