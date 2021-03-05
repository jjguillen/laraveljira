<x-app-layout>
    <x-form.form action="/admin/categorias">
      <x-form.header>Categorias</x-form.header>
      <x-form.content route-for-cancel="/admin/categorias">
        <x-form.form-group>
          <x-form.input-text name="nombre">Nombre</x-form.input-text>
        </x-form.form-group>
      </x-form.content>
    </x-form.form>
</x-app-layout>
