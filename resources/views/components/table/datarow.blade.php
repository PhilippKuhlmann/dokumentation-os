@props(['values', 'values', 'editUrl', 'deleteUrl'])

<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    @foreach ($values as $key => $value)
        @if ($key == 'url')
            <td scope="row" class="py-4 px-6">
                <a href="{{ $value }}" target="_blank"  class="text-blue-500 hover:text-blue-700">{{ $value }}</a>
            </td>
        @else
            <td scope="row" class="py-4 px-6">
                {{ $value }}
            </td>
        @endif

    @endforeach

    <td class="py-4 px-6">
        <div class="flex flex-row space-x-2">
            <a href="{{ $editUrl }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            <form method="POST" action="{{ $deleteUrl }}">
                @csrf
                @method('delete')
                <button class="text-red-500 hover:text-red-700" type="submit">Del</button>
            </form>
        </div>

    </td>
</tr>
