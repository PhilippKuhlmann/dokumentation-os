<x-empty-layout>

<div class="flex max-w-3xl mx-auto">
    <div class="markdown">
        {{  Illuminate\Mail\Markdown::parse($changelog)  }}
    </div>
</div>



</x-empty-layout>

