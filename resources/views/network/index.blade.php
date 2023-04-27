<x-app-layout :$customer>



    <div class="flex flex-col md:flex-row md:flex-wrap w-full">

        <div class="md:w-1/5">
            <div class="m-3 p-3 text-center rounded-md dark:text-gray-100 outline-4 outline-dashed outline-gray-600 hover:outline-blue-500">
                <a href="/{{ $customer->slug }}/network/create"
                    class="text-gray-600 hover:text-blue-500">
                    <div class="flex h-32 ">
                        <span class="m-auto text-3xl text-center font-semibold ">+</span>
                    </div>
                </a>
            </div>

        </div>

        @foreach ($customer->networks as $network)
        <div class="md:w-1/5">
            <div class="m-3 p-3 rounded-md shadow-md bg-white dark:bg-gray-800 dark:text-gray-100">
                <a href="/{{ $customer->slug }}/network/{{ $network->id }}"
                    class="">
                    <div class="flex h-20 ">
                        <span class="m-auto text-2xl text-center font-semibold">vlan {{ $network->vlanId }}</span>
                    </div>
                    <div class="flex h-12 flex-col mx-auto text-center">
                        <span>{{ $network->description }}</span>
                        <span>{{ $network->network }}{{ $network->cidr }}</span>
                    </div>
                </a>
            </div>

        </div>


        @endforeach





    </div>

</x-app-layout>
