<x-app-layout :$customer>
    <x-create.main header="Zertifikat bearbeiten" labelsubmit="Speichern" action="{{ route('certificate.update', [$customer, $certificate]) }}">
        @method('PATCH')
        <x-create.singlerow label="Bezeichnung" name="name" :default="$certificate->name" />
        <x-create.doublerow label1="Domain / CN" name1="common_name" :default1="$certificate->common_name" label2="Aussteller" name2="issuer" :default2="$certificate->issuer" />
        <x-create.doublerow label1="Typ" name1="type" :default1="$certificate->type" label2="Ablaufdatum" name2="expiry_date" :default2="$certificate->expiry_date" type2="date" />
        <x-create.singlerow label="Ausgestellt am" name="issued_date" type="date" :default="$certificate->issued_date" />
        <x-create.singlerow label="Notizen" name="notes" :default="$certificate->notes" />
    </x-create.main>
    @can('certificate_delete')
        <x-deletecard action="{{ route('certificate.destroy', [$customer, $certificate]) }}" />
    @endcan
</x-app-layout>
