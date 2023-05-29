<div class="flex w-full pl-3 pt-3 gap-3">
        @cannot('isCustomerR')
            <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
        @endcannot

    <!-- <x-input.linkbutton label="Zurück" link="{{ url()->previous() }}" color="gray" /> -->

        {{ $slot }}

</div>
