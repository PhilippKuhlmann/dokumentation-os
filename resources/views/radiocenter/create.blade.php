<x-app-layout :$customer>
    <x-create.main header="Neue Funkzentrale" action="{{ route('radiocenter.store', $customer) }}">

        <x-create.select name="site_id" value="Standort" :array="$sites" />

        <x-create.singlerow label="Frequenz in Mhz" name="frequency" />

        <div class="flex flex-col mt-2">
            <x-input.label for="channel_spacing" value="Kanalabstand in kHz" />
            <x-input.select id="channel_spacing" name="channel_spacing">
                <option value="20" {{ "20" == old('channel_spacing') ? 'selected' : '' }}>20</option>
                <option value="12,5" {{ "12,5" == old('channel_spacing') ? 'selected' : '' }}>12,5</option>
                <option value="6,25" {{ "6,25" == old('channel_spacing') ? 'selected' : '' }}>6,25</option>
            </x-input.select>
        </div>

        <x-create.singlerow label="Leistung in W" name="power" default="6" />

        <x-create.singlerow label="Auswerter" name="evaluator" />

        <x-create.singlerow label="Geber" name="encoder" />

        <x-create.singlerow label="Quittung" name="receipt" />

        <div class="flex flex-col mt-2">
            <x-input.label for="pilot_tone" value="Pilotton in Hz" />
            <x-input.select id="pilot_tone" name="pilot_tone">
                @foreach ($pilote_tones as $tone)
                    <option value="{{ $tone }}" {{ $tone == old('pilot_tone') ? 'selected' : '' }}>{{ $tone }}</option>
                @endforeach
            </x-input.select>
        </div>

        <div class="flex flex-col mt-2">
            <x-input.label for="transmission_type" value="Übertragungsart" />
            <x-input.select id="transmission_type" name="transmission_type">
                <option value="Analog" {{ "Analog" == old('transmission_type') ? 'selected' : '' }}>Analog</option>
                <option value="Digital" {{ "Digital" == old('transmission_type') ? 'selected' : '' }}>Digital</option>
                <option value="Analog/Digital" {{ "Analog/Digital" == old('transmission_type') ? 'selected' : '' }}>Analog/Digital</option>
            </x-input.select>
        </div>

    </x-create.main>
</x-app-layout>
