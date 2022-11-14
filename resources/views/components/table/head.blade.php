@props(['labels'])

<thead class=" text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        @foreach ($labels as $label)
            <th scope="col" class="py-3 px-6">
                {{ $label }}
            </th>
        @endforeach
    </tr>
</thead>
