<x-admin-layout>
    <div class="flex p-10 dark:text-white">
        <div class="flex flex-col">
            @foreach ($serverOperatingSystems as $os)
            <div class="flex justify-between">
                <div class="">{{ $os->name  }}</div>
                <div class="ml-10">{{ $os->servers()->count() }}</div>
            </div>

            @endforeach
        </div>
        <div class="ml-10">
            <h1>Server Betriebsystem hinzufügen</h1>
        <form method="POST" action="/admin/create/serveroperatingsystem">
            @csrf
            <x-inputs.field name="name" placeholder="Name" />
            <x-inputs.button label="Hinzufügen" />
        </form>
        </div>
    </div>



    <div class="dark:text-white">

    </div>
</x-admin-layout>
