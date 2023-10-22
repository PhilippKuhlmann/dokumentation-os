@props(['labels'])

<thead class=" text-gray-100 bg-chathams-blue-800 dark:bg-gray-700 dark:text-gray-100">
    <tr>
        @foreach ($labels as $label)
            <th scope="col" class="py-3 px-6">
                {{ $label }}
            </th>
        @endforeach
    </tr>
</thead>
