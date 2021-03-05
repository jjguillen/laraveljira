<x-app-layout>

  <x-table.table-detalle resource-name="producto">

    <x-table.body>
      <tr>
        <x-table.head-cell>Imagen</x-table.head-cell>
        <x-table.cell><img class="w-48 h-32 object-cover"
            src="{{ $producto->imagen ? url('storage/imagenes_productos/' . $producto->imagen) : 'https://via.placeholder.com/150x100' }}"
            alt=""></x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Codigo</x-table.head-cell>
        <x-table.cell>{{ $producto->codigo }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Modelo</x-table.head-cell>
        <x-table.cell>{{ $producto->modelo }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Fabricante</x-table.head-cell>
        <x-table.cell>{{ $producto->fabricante }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Descripcion</x-table.head-cell>
        <x-table.cell>{{ $producto->descripcion }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Stock</x-table.head-cell>
        <x-table.cell>{{ $producto->stock }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Estado</x-table.head-cell>
        <x-table.cell>{{ $producto->estado }}</x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Localizacion</x-table.head-cell>
        <x-table.cell>
          <a class="text-blue-700 underline" href="{{ url('/admin/localizaciones/' . $producto->localizacion->id) }}">
            {{ $producto->localizacion->nombre_edificio }} - {{ $producto->localizacion->ciudad }}
          </a>
        </x-table.cell>
      </tr>
      <tr>
        <x-table.head-cell>Categoria</x-table.head-cell>
        <x-table.cell>
          <a class="text-blue-700 underline" href="{{ url('/admin/categorias/' . $producto->categoria->id) }}">
            {{ $producto->categoria->nombre }}
          </a>
        </x-table.cell>
      </tr>

      <x-table.row resource-name="productos" :resource-id="$producto->id" />

    </x-table.body>
  </x-table.table-detalle>

</x-app-layout>
