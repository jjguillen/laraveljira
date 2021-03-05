<x-app-layout>

  @if ($errors->any())
    <x-form.errors :errors='$errors' />
  @endif

  <x-form.form action="/admin/productos">
    <x-form.header>Productos</x-form.header>
    <x-form.content route-for-cancel="/admin/productos">
      <x-form.form-group>
        <x-form.input-text name="codigo">Codigo</x-form.input-text>
        <x-form.input-text name="modelo">Modelo</x-form.input-text>
      </x-form.form-group>
      <x-form.input-text name="fabricante">Fabricante</x-form.input-text>
      <x-form.input-textarea name="descripcion">Descripcion</x-form.input-textarea>
      <x-form.input-file name="imagen" />
      <x-form.input-select name="localizacion">
        Localizacion
        <x-slot name="options">
          @foreach ($localizaciones as $localizacion)
            <option value="{{ $localizacion->id }}">
              {{ $localizacion->nombre_edificio . ' - ' . $localizacion->ciudad }}</option>
          @endforeach
        </x-slot>
      </x-form.input-select>
      <x-form.form-group>
        <x-form.input-select name="categoria">
          Categoria
          <x-slot name="options">
            @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}">{{ $categoria->id . ' - ' . $categoria->nombre }}</option>
            @endforeach
          </x-slot>
        </x-form.input-select>
        <x-form.input-select name="estado">
          Estado
          <x-slot name="options">
            <option value="activo">Activo</option>
            <option value="roto">Roto</option>
            <option value="desparecido">Desparecido</option>
          </x-slot>
        </x-form.input-select>
      </x-form.form-group>
      <x-form.input-number name="stock">Stock</x-form.input-number>
    </x-form.content>
  </x-form.form>
</x-app-layout>
