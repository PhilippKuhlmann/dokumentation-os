<x-app-layout :$customer>
    <div class="p-3">

        <div class="flex justify-between">
            <div class="text-3xl">
                Daschboard - {{ $customer->name }}
            </div>
            <div class="">
                <form action="{{ route('customer.view-pdf', $customer) }}" method="POST" target="__blank">
                    @csrf
                    <button type="submit" class="px-3 py-2 text-sm bg-blue-600">Als PDF anzeigen</button>
                </form>
            </div>
        </div>

        <div class="m-10"></div>



        <div class="flex w-48 h-24 bg-gray-900">
            <div class="flex w-16 h-24 justify-center items-center">
                <x-svg.server class="h-8 w-8" />
            </div>
            <div class="flex flex-col grow">
                <div class="pt-3 text-xl text-center">
                    Server
                </div>
                <div class="flex text-xl justify-center items-center grow">
                    {{ $customer->servers()->count() }}
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
