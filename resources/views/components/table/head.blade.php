@props(['labels'])

<thead class="text-xs uppercase tracking-wide text-gray-500 bg-gray-50 border-b border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
    <tr>
        @foreach ($labels as $label)
            <th scope="col" class="py-2.5 px-4 font-semibold">
                {{ $label }}
            </th>
        @endforeach
    </tr>
</thead>
