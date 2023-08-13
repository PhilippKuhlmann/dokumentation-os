<x-app-layout :$customer>
    <div class="p-3">

        <div class="flex justify-between">
            <div class="text-3xl text-gray-100">
                {{ $customer->name }}
            </div>
            <div class="">
                <form action="{{ route('customer.view-pdf', $customer) }}" method="POST" target="__blank">
                    @csrf
                    <x-input.button label="PDF erstellen" />
                </form>
            </div>
        </div>

        <div class="flex flex-col text-gray-100 w-64 p-5">
            <div class="text-2xl mt-5">Standorte</div>

            @foreach ($sites as $site)
                <div class="mt-5">
                    <div class="text-xl">{{ $site->name }}</div>
                    <div class="text-sm text-gray-400">{{ $site->street }} {{ $site->house_number }}</div>
                    <div class="text-sm text-gray-400">{{ $site->zip }} {{ $site->city }}</div>
                </div>
            @endforeach



        </div>








    </div>
</x-app-layout>
