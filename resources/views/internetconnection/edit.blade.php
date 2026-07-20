<x-app-layout :$customer>
    <x-create.main header="Internet-Anschluss bearbeiten" labelsubmit="Speichern" action="{{ route('internetconnection.update', [$customer, $internetconnection]) }}">
        @method('PATCH')
        <x-edit.select name="site_id" value="Standort" selector="{{ $internetconnection->site_id }}" :array="$sites" />
        <x-create.doublerow label1="Anbieter" name1="provider" :default1="$internetconnection->provider" label2="Produkt" name2="product" :default2="$internetconnection->product" />
        <x-create.doublerow label1="Vertragsnummer" name1="contract_number" :default1="$internetconnection->contract_number" label2="Anschlussart" name2="connection_type" :default2="$internetconnection->connection_type" />
        <x-create.doublerow label1="Download" name1="bandwidth_down" :default1="$internetconnection->bandwidth_down" label2="Upload" name2="bandwidth_up" :default2="$internetconnection->bandwidth_up" />
        <x-create.doublerow label1="WAN-IP" name1="wan_ip" :default1="$internetconnection->wan_ip" label2="Hotline" name2="hotline" :default2="$internetconnection->hotline" />
        <x-create.singlerow label="Notizen" name="notes" :default="$internetconnection->notes" />
    </x-create.main>
    @can('internetconnection_delete')
        <x-deletecard action="{{ route('internetconnection.destroy', [$customer, $internetconnection]) }}" />
    @endcan
</x-app-layout>
