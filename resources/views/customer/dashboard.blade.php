<x-app-layout :$customer>
    <div class="p-3">

        <div class="flex justify-between">
            <div class="text-3xl dark:text-gray-100">
                Daschboard - {{ $customer->name }}
            </div>
            <div class="">
                <form action="{{ route('customer.view-pdf', $customer) }}" method="POST" target="__blank">
                    @csrf
                    <button type="submit" class="px-3 py-2 text-sm text-gray-100 rounded-md bg-blue-600">PDF export</button>
                </form>
            </div>
        </div>








    </div>
</x-app-layout>
