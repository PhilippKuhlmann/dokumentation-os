<div class="m-3 p-5 sm:p-6 rounded-xl border border-gray-200 bg-white shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="text-lg font-CoconPro text-chathams-blue-800 dark:text-gray-100 mb-4">Weitere IP-Adressen</div>

    @if ($entries->isNotEmpty())
        <table class="w-full text-sm mb-4">
            <thead class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100 dark:border-gray-700">
                <tr>
                    <th class="py-2 pr-4 text-left font-semibold">IP-Adresse</th>
                    <th class="py-2 pr-4 text-left font-semibold">VLAN</th>
                    <th class="py-2 pr-4 text-left font-semibold">Bezeichnung</th>
                    <th class="py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr class="border-b border-gray-50 last:border-0 dark:border-gray-700/50">
                        <td class="py-2 pr-4 font-mono text-gray-900 dark:text-gray-100">{{ $entry->address }}</td>
                        <td class="py-2 pr-4 text-gray-600 dark:text-gray-300">
                            {{ $entry->network ? ($entry->network->description ?: 'VLAN ' . $entry->network->vlanId) : '—' }}
                        </td>
                        <td class="py-2 pr-4 text-gray-600 dark:text-gray-300">{{ $entry->label ?: '—' }}</td>
                        <td class="py-2 text-right">
                            <button type="button" wire:click="remove({{ $entry->id }})"
                                wire:confirm="IP-Adresse entfernen?"
                                class="text-red-600 hover:text-red-700 text-sm">Entfernen</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-sm text-gray-400 dark:text-gray-500 mb-4">Noch keine zusätzlichen IP-Adressen.</div>
    @endif

    <div class="flex flex-wrap items-end gap-2" x-data>
        <div class="flex flex-col">
            <x-input.label value="IP-Adresse" />
            <x-input.text wire:model="address" x-ref="addr" type="text" class="mt-1 w-40" placeholder="10.10.30.1" />
            @error('address') <span class="text-xs text-red-600 mt-1">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col">
            <x-input.label value="VLAN (optional)" />
            {{-- Bei Auswahl eines VLANs das IP-Feld mit dem Netz-Präfix (erste 3 Oktette) vorbefüllen;
                 ein bereits eingegebenes letztes Oktett bleibt erhalten. --}}
            <x-input.select name="network_id" wire:model="network_id" class="mt-1"
                x-on:change="
                    const prefix = $event.target.selectedOptions[0]?.dataset.prefix || '';
                    if (prefix) {
                        const parts = $refs.addr.value.split('.');
                        const host = parts.length === 4 ? parts[3] : '';
                        $refs.addr.value = prefix + host;
                        $refs.addr.dispatchEvent(new Event('input'));
                    }
                ">
                <option value="">— kein VLAN —</option>
                @foreach ($networks as $network)
                    @php
                        $octets = explode('.', (string) $network->network);
                        $prefix = count($octets) === 4 ? $octets[0] . '.' . $octets[1] . '.' . $octets[2] . '.' : '';
                    @endphp
                    <option value="{{ $network->id }}" data-prefix="{{ $prefix }}">{{ $network->description ?: 'VLAN ' . $network->vlanId }} ({{ $network->network }}/{{ $network->cidr }})</option>
                @endforeach
            </x-input.select>
        </div>
        <div class="flex flex-col">
            <x-input.label value="Bezeichnung (optional)" />
            <x-input.text wire:model="label" type="text" class="mt-1 w-48" placeholder="z. B. Gateway" />
        </div>
        <x-input.button type="button" wire:click="add" label="Hinzufügen" />
    </div>
</div>
