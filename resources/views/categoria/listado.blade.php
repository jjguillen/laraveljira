<x-app-layout>
    <x-table.table resource-name="categorias">
        <x-table.head>
            <x-table.head-cell>ID</x-table.head-cell>
            <x-table.head-cell>Nombre</x-table.head-cell>
        </x-table.head>
        <x-table.body>
            @foreach ($categorias as $categoria)
                <x-table.row resource-name="categorias" :resource-id="$categoria->id">
                    <x-table.cell>{{ $categoria->id }}</x-table.cell>
                    <x-table.cell>{{ $categoria->nombre }}</x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
        <x-slot name="footer">
            {{ $categorias->links()}}
        </x-slot>
    </x-table.table>
</x-app-layout>
