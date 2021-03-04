<x-app-layout>
  <x-form.form action="/admin/productos/{{ $producto->id }}">
    @method('PUT')
    <x-form.header>Productos</x-form.header>
    <x-form.content route-for-cancel="{{ url()->previous() }}">
      <x-form.form-group>
        <x-form.input-text name="codigo" :value="$producto->codigo">Codigo</x-form.input-text>
        <x-form.input-text name="modelo" :value="$producto->modelo">Modelo</x-form.input-text>
      </x-form.form-group>
      <x-form.input-text name="fabricante" :value="$producto->fabricante">Fabricante</x-form.input-text>
      <x-form.input-textarea name="descripcion">
        Descripcion
        <x-slot name="content">
          {{ $producto->descripcion }}
        </x-slot>
      </x-form.input-textarea>
      <div class="p-1">
        Imagen actual
        <img class="w-32" src="{{ url('storage/imagenes_productos/' . $producto->imagen) }}" alt="">
      </div>
      <x-form.input-file name="imagen" :value="$producto->imagen" />
      <x-form.input-select name="localizacion">
        Localizacion
        <x-slot name="options">
          @foreach ($localizaciones as $localizacion)
            <option value="{{ $localizacion->id }}"
              {{ $producto->localizacion->id === $localizacion->id ? 'selected="selected"' : '' }}>
              {{ $localizacion->nombre_edificio . ' - ' . $localizacion->ciudad }}</option>
          @endforeach
        </x-slot>
      </x-form.input-select>
      <x-form.form-group>
        <x-form.input-select name="categoria">
          Categoria
          <x-slot name="options">
            @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}"
                {{ $producto->categoria->id === $categoria->id ? 'selected="selected"' : '' }}>
                {{ $categoria->id . ' - ' . $categoria->nombre }}</option>
            @endforeach
          </x-slot>
        </x-form.input-select>
        <x-form.input-select name="estado">
          Estado
          <x-slot name="options">
            <option {{ $producto->estado === 'activo' ? 'selected="selected"' : '' }} value="activo">
              Activo</option>
            <option {{ $producto->estado === 'roto' ? 'selected="selected"' : '' }} value="roto">Roto</option>
            <option {{ $producto->estado === 'desparecido' ? 'selected="selected"' : '' }} value="desparecido">
              Desparecido
            </option>
          </x-slot>
        </x-form.input-select>
      </x-form.form-group>
      <x-form.input-number name="stock" :value="$producto->stock">Stock</x-form.input-number>
    </x-form.content>
  </x-form.form>
</x-app-layout>
