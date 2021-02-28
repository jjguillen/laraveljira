<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <x-table.table resource-name="Producto">
    <x-table.head>
      <x-table.head-cell>Imagen</x-table.head-cell>
      <x-table.head-cell>Codigo</x-table.head-cell>
      <x-table.head-cell>Modelo</x-table.head-cell>
      <x-table.head-cell>Fabricante</x-table.head-cell>
      <x-table.head-cell>Descripcion</x-table.head-cell>
      <x-table.head-cell>Stock</x-table.head-cell>
      <x-table.head-cell>Estado</x-table.head-cell>
      <x-table.head-cell>Localizacion</x-table.head-cell>
    </x-table.head>
    <x-table.body>
      @foreach ($productos as $producto)
        <x-table.row resource-name="productos" :resource-id="$producto->id">
          <x-table.cell>--Replace with image--</x-table.cell>
          <x-table.cell>{{ $producto->codigo }}</x-table.cell>
          <x-table.cell>{{ $producto->modelo }}</x-table.cell>
          <x-table.cell>{{ $producto->fabricante }}</x-table.cell>
          <x-table.cell>{{ $producto->descripcion }}</x-table.cell>
          <x-table.cell>{{ $producto->stock }}</x-table.cell>
          <x-table.cell>{{ $producto->estado }}</x-table.cell>
          <x-table.cell>{{ $producto->localizacion->ciudad }} - {{ $producto->localizacion->nombre_edificio }}
          </x-table.cell>
        </x-table.row>
      @endforeach
    </x-table.body>
  </x-table.table>
</x-app-layout>