<x-app-layout>
    <x-table.table resource-name="categorias" resource-detail="">
        <x-table.head>
            <x-table.head-cell>ID</x-table.head-cell>
            <x-table.head-cell>Nombre</x-table.head-cell>
        </x-table.head>
        <x-table.body>
            @foreach ($categorias as $categoria)
                <x-table.row resource-name="categorias" :resource-id="$categoria->id">
                    <x-table.cell>{{ $categoria->id }}</x-table.cell>
                    <x-table.cell>{{ $categoria->nombre }}</x-table.cell>
                    <x-table.cell>
                        <div class="flex justify-center space-x-2">
                            <x-button.delete actionUrl="{{Route('categorias.destroy', $categoria->id)}}" />
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-table.body>
        <x-slot name="footer">
            {{ $categorias->links()}}
        </x-slot>
    </x-table.table>
</x-app-layout>
