<x-app-layout>
  <x-form.form action="/admin/productos">
    <x-form.header>Productos</x-form.header>
    <x-form.content route-for-cancel="/admin/productos">
      <x-form.form-group>
        <x-form.input-text name="codigo">Codigo</x-form.input-text>
        <x-form.input-text name="modelo">Modelo</x-form.input-text>
      </x-form.form-group>
      <x-form.input-text name="fabricante">Codigo</x-form.input-text>
      <x-form.input-textarea name="descripcion">Descripcion</x-form.input-textarea>
      <x-form.input-file name="imagen" />
      <x-form.form-group>
        <x-form.input-text name="stock">Stock</x-form.input-text>
        <x-form.input-text name="estado">Estado</x-form.input-text>
      </x-form.form-group>
      <x-form.input-text name="localizacion">Localizacion</x-form.input-text>
    </x-form.content>
  </x-form.form>
</x-app-layout>
