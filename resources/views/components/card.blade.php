

<div class="flex flex-col m-3 rounded-xl border border-gray-200 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700">
    @if (trim($head))
        <div class="border-b border-gray-100 dark:border-gray-700">
            {{ $head }}
        </div>
    @endif
    <div class="flex flex-wrap gap-x-8 gap-y-5 p-5">
        {{ $body }}
    </div>
</div>
