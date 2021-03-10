<x-app-layout>

    <x-table.table resource-name="localizaciones">
        <x-table.head>
            <x-table.head-cell>Ciudad</x-table.head-cell>
            <x-table.head-cell>Nombre edificio</x-table.head-cell>
            <x-table.head-cell>Dirección edificio</x-table.head-cell>
            <x-table.head-cell>Numero de sala</x-table.head-cell>
        </x-table.head>
        <x-table.body>
            @foreach ($localizaciones as $localizacion)
                <x-table.row>
                    <x-table.cell>{{ $localizacion->ciudad }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->nombre_edificio }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->direccion_edificio }}</x-table.cell>
                    <x-table.cell>{{ $localizacion->numero_sala }}</x-table.cell>
                    <x-table.cell>
                        <div class="flex justify-center space-x-2">
                            <x-button.see url='/admin/localizaciones/{{ $localizacion->id }}' />
                            <x-button.edit url='/admin/localizaciones/{{ $localizacion->id }}/edit' />
                            <x-button.delete actionUrl='/admin/localizaciones/{{ $localizacion->id }}' />
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
        <x-slot name="footer">
            {{ $localizaciones->links() }}
        </x-slot>
    </x-table.table>

</x-app-layout>
