<x-app-layout :$customer>
    <div class="p-3 sm:p-5">
        <div class="text-3xl font-CoconPro text-gray-900 dark:text-gray-100 mb-1">IPAM</div>
        <div class="text-sm text-gray-500 dark:text-gray-400 mb-5">IP-Adressverwaltung — belegte und freie Adressen je VLAN</div>

        @forelse ($plans as $entry)
            @php $network = $entry['network']; $plan = $entry['plan']; @endphp

            <div class="mb-6 bg-white rounded-xl border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                <div class="flex flex-wrap items-baseline justify-between gap-2 px-5 py-3 border-b border-gray-100 bg-[#f3f6fb] dark:bg-gray-700/40 dark:border-gray-700">
                    <div class="text-lg font-CoconPro text-chathams-blue-800 dark:text-gray-100">
                        {{ $network->description ?: 'VLAN' }}
                        @if ($network->vlanId)
                            <span class="text-sm text-gray-400 font-DINPro">VLAN {{ $network->vlanId }}</span>
                        @endif
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $network->network }}/{{ $network->cidr ?: '?' }}
                        @if (! ($plan['error'] ?? null))
                            · {{ $plan['usedCount'] }} belegt
                        @endif
                    </div>
                </div>

                @if ($plan['error'] ?? null)
                    <div class="px-5 py-4 text-sm text-amber-600 dark:text-amber-400">{{ $plan['error'] }} — bitte Netzadresse und CIDR/Subnetzmaske prüfen.</div>
                @else
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase tracking-wide text-gray-400 bg-gray-50 border-b border-gray-100 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
                            <tr>
                                <th class="py-2 px-5 font-semibold w-1/3">IP-Adresse</th>
                                <th class="py-2 px-5 font-semibold">Zuordnung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan['rows'] as $row)
                                <tr class="border-b border-gray-50 last:border-0 dark:border-gray-700/50
                                    @if ($row['kind'] === 'free') text-gray-400 dark:text-gray-500
                                    @elseif ($row['kind'] === 'dhcp') bg-amber-50/40 dark:bg-amber-900/10 @endif">
                                    <td class="py-1.5 px-5 font-mono whitespace-nowrap {{ $row['kind'] === 'device' ? 'text-gray-900 dark:text-gray-100' : '' }}">
                                        @if ($row['single'])
                                            {{ $row['from'] }}
                                        @else
                                            {{ $row['from'] }} – {{ $row['to'] }}
                                        @endif
                                    </td>
                                    <td class="py-1.5 px-5">
                                        @if ($row['kind'] === 'device')
                                            <span class="text-gray-900 dark:text-gray-100">{{ $row['label'] }}</span>
                                        @elseif ($row['kind'] === 'dhcp')
                                            <span class="text-amber-700 dark:text-amber-400">{{ $row['label'] }}</span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 italic">{{ $row['label'] }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($plan['truncated'] ?? false)
                        <div class="px-5 py-3 text-xs text-gray-400 border-t border-gray-100 dark:border-gray-700">
                            Subnetz zu groß — nur die ersten 8.192 Adressen aufgelistet.
                        </div>
                    @endif
                @endif
            </div>
        @empty
            <div class="text-sm text-gray-400">Keine VLANs angelegt.</div>
        @endforelse
    </div>
</x-app-layout>
