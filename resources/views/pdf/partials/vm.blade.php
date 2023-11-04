<div class="heading">
    VM
</div>

@foreach ($customer->vms as $vm)
    <div class="card">
        <div class="card-title">
            {{ $vm->name }}
        </div>
        <div class="card-container">

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Netzwerk
                </div>
                <table>
                    <tr>
                        <td class="w-120">IP-Adresse 1</td>
                        <td>{{ $vm->ip1 }}</td>
                    </tr>
                    <tr>
                        <td class="w-120">IP-Adresse 2</td>
                        <td>{{ $vm->ip2 }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Dienste
                </div>
                <div class="service-container">
                    @foreach ($vm->services as $key => $value)
                        {{ $value }},
                    @endforeach
                </div>
            </div>

            <div class="card-table" style="float: left; width: 30%;">
                <div class="card-table-title">
                    Betriebsystem
                </div>
                <div class="">
                    {{ $vm->operatingSystem->name }}
                </div>
            </div>


            <div style="clear: both;"></div>

        </div>
    </div>

@endforeach
