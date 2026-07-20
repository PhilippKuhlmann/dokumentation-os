<x-app-layout :$customer>
    <x-create.main header="Neuer Internet-Anschluss" action="{{ route('internetconnection.store', $customer) }}">
        <x-create.select name="site_id" value="Standort" :array="$sites" />
        <x-create.doublerow label1="Anbieter" name1="provider" label2="Produkt" name2="product" />
        <x-create.doublerow label1="Vertragsnummer" name1="contract_number" label2="Anschlussart" name2="connection_type" />
        <x-create.doublerow label1="Download" name1="bandwidth_down" label2="Upload" name2="bandwidth_up" />
        <x-create.doublerow label1="WAN-IP" name1="wan_ip" label2="Hotline" name2="hotline" />
        <x-create.singlerow label="Notizen" name="notes" />
    </x-create.main>
</x-app-layout>
