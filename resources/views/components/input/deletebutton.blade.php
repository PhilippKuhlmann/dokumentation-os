@props(['link'])

<form method="POST" action="{{ $link }}">
    @csrf
    @method('DELETE')
    <x-input.button label="Löschen" class="bg-red-500 hover:bg-red-700 text-sm" />
</form>
