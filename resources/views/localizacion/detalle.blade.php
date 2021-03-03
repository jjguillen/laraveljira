<x-app-layout>

    <x-table.table-detalle resource-name="detalle localizacion">

        <x-table.body>
            <tr>
                <x-table.head-cell>Ciudad</x-table.head-cell>
                <x-table.cell>{{ $localizacion->ciudad }}</x-table.cell>
            </tr>
            <tr>
                <x-table.head-cell>Nombre edificio</x-table.head-cell>
                <x-table.cell>{{ $localizacion->nombre_edificio }}</x-table.cell>
            </tr>
            <tr>
                <x-table.head-cell>Dirección edificio</x-table.head-cell>
                <x-table.cell>{{ $localizacion->direccion_edificio }}</x-table.cell>
            </tr>
            <tr>
                <x-table.head-cell>Numero de sala</x-table.head-cell>
                <x-table.cell>{{ $localizacion->numero_sala }}</x-table.cell>
            </tr>

            <x-table.row resource-name="localizaciones" :resource-id="$localizacion->id" />

        </x-table.body>
    </x-table.table-detalle>

</x-app-layout>
