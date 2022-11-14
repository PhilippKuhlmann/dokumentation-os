@props(['title', 'array' => []])

<div class="w-96 h-28">
    <div class="text-sm text-gray-500">
        {{ $title }}
    </div>
    <div class="text-sm dark:text-gray-100">
        <table class="w-full">
            @foreach ($array as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
