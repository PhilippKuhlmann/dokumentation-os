@props(['link'])

<form method="POST" action="{{ $link }}">
    @csrf
    @method('DELETE')
    <x-inputs.button label="Löschen" class="bg-red-500 hover:bg-red-700 text-sm" />
</form>
