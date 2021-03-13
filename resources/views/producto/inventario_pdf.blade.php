<x-table.table resource-name="productos">
    <x-table.head>
        <x-table.head-cell>Imagen</x-table.head-cell>
        <x-table.head-cell>Codigo</x-table.head-cell>
        <x-table.head-cell>Modelo</x-table.head-cell>
        <x-table.head-cell>Fabricante</x-table.head-cell>
        <x-table.head-cell>Descripcion</x-table.head-cell>
        <x-table.head-cell>Stock</x-table.head-cell>
        <x-table.head-cell>Estado</x-table.head-cell>
        <x-table.head-cell>Categoria</x-table.head-cell>
        <x-table.head-cell>Localizacion</x-table.head-cell>
    </x-table.head>
    <x-table.body>
        @foreach ($productos as $producto)
            <x-table.row resource-name="productos" :resource-id="$producto->id">
                <x-table.cell class="w-32 h-24"><img class="object-cover"
                        src="{{ $producto->imagen ? url('storage/imagenes_productos/' . $producto->imagen) : 'https://via.placeholder.com/150x100' }}"
                        alt="">
                </x-table.cell>
                <x-table.cell>{{ $producto->codigo }}</x-table.cell>
                <x-table.cell>{{ $producto->modelo }}</x-table.cell>
                <x-table.cell>{{ $producto->fabricante }}</x-table.cell>
                <x-table.cell>{{ $producto->descripcion }}</x-table.cell>
                <x-table.cell>{{ $producto->stock }}</x-table.cell>
                <x-table.cell>{{ $producto->estado }}</x-table.cell>
                <x-table.cell>{{ $producto->categoria->nombre }}</x-table.cell>
                <x-table.cell>{{ $producto->localizacion->ciudad }} -
                    {{ $producto->localizacion->nombre_edificio }}
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table.body>
    <x-slot name="footer">
        {{ $productos->links() }}
    </x-slot>
</x-table.table>
