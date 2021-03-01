<x-app-layout>

    <x-table.table resource-name="Localizacion">
        <x-table.head>
            <x-table.head-cell>Ciudad</x-table.head-cell>
            <x-table.head-cell>Nombre edificio</x-table.head-cell>
            <x-table.head-cell>Dirección edificio</x-table.head-cell>
            <x-table.head-cell>Numero de sala</x-table.head-cell>
        </x-table.head>
        <x-table.body>
            @foreach ($localizaciones as $localizacion)
                <x-table.row resource-name="localizaciones" :resource-id="$localizacion->id">
                    <x-table.cell>{{ $localizacion->ciudad }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->nombre_edificio }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->direccion_edificio }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->numero_sala }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>

</x-app-layout>
