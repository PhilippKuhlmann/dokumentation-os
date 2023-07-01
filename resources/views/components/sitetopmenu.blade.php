<div class="flex w-full pl-3 pt-3 gap-3">
        @cannot('isCustomerR')
            <x-input.linkbutton label="Neu" link="/{{ Request::path() }}/create" />
        @endcannot

        {{ $slot }}
</div>
