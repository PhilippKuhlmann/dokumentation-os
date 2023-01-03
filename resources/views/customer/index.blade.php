<x-app-layout :$customer>

    <div class="text-3xl">
        Daschboard
    </div>

    <div class="m-10">
        <div class="bg-gray-900 p-5">
            <form action="{{ route('customer.view-pdf', $customer) }}" method="POST" target="__blank">
                @csrf
                <button type="submit" class="p-5 bg-blue-500">Als PDF anzeigen</button>
            </form>
        </div>

    </div>


</x-app-layout>
