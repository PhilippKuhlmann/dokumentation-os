<x-app-layout :$customer>

    <div class="w-full p-3">

        <div class="flex flex-col w-fit rounded-md shadow-md bg-white dark:bg-gray-800">
            <div class="w-full text-2xl text-center p-3 dark:text-gray-100">
                Ändern VM
            </div>
            <form method="post" action="/{{ $customer->slug }}/vm/{{ $vm->id }}" class="p-5">
                @csrf
                @method('PATCH')

                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field type="name" name="name" placeholder="Name" value="{{ $vm->name }}" autofocus/>
                </div>
                <div class="flex flex-row gap-3 mb-3">
                    <x-inputs.field name="ip1" placeholder="IP 1" value="{{ $vm->ip1 }}" />
                    <x-inputs.field name="ip2" placeholder="IP 2" value="{{ $vm->ip2 }}" />
                </div>
                <div class="flex flex-col gap-3 mb-3">
                    <x-inputs.select name="server_operating_system_id">
                        @foreach ($serverOperatingSystems as $os)
                            <option value="{{ $os->id }}" @if ($os->id == $vm->server_operating_system_id)
                                selected
                            @endif>{{ $os->name }}</option>
                        @endforeach
                    </x-inputs.select>
                </div>
                <div class="flex flex-col gap-3 mb-3">
                    <label for="services" class="text-white">Dienste Bitte mit komma getrennt angeben</label>
                    @if ($vm->services > 1)
                        <x-inputs.field id="services" name="services" placeholder="Dienste" value="{{ implode(',', $vm->services) }}" />
                    @else
                    <x-inputs.field id="services" name="services" placeholder="Dienste" value="" />
                    @endif
                </div>
                <div class="flex flex-row gap-3">
                    <x-inputs.button label="Ändern" />
                </div>
            </form>
        </div>
    </div>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach


</x-app-layout>
