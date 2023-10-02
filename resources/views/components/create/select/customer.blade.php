<div class="flex flex-col mt-2">
    <x-input.label for="customer_id" value="Kunde" />
    <x-input.select id="customer_id" name="customer_id">
        <option value="">Kein Kunde</option>
        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </x-input.select>
</div>
