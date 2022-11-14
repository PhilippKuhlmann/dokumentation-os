@props(['activeUrl',
'link' => '/{{ $customer->slug }}'])

<li class="relative px-3 py-1">
    <span class="{{ $activeUrl ? '' : 'hidden' }} absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"></span>
    <a class="inline-flex items-center w-full text-md hover:text-blue-700 " href="{{ $link  }}">
        {{ $icon }}

        <span class="ml-4">{{ $slot }}</span>
    </a>
</li>
