<x-app-layout>

    @if ($errors->any())
        <x-form.errors :errors='$errors' />
    @endif

    <x-form.form action="/admin/localizaciones">
        <x-form.header>Nueva localización</x-form.header>
        <x-form.content route-for-cancel="/admin/localizaciones">

            <x-form.input-text name="ciudad" value="{{ old('ciudad') }}">Ciudad</x-form.input-text>
            <x-form.input-text name="nombre_edificio" value="{{ old('nombre_edificio') }}">Nombre edificio
            </x-form.input-text>
            <x-form.input-text name="direccion_edificio" value="{{ old('direccion_edificio') }}">Dirección edificio
            </x-form.input-text>
            <x-form.input-number name="numero_sala" value="{{ old('numero_sala') }}">Numero de sala
            </x-form.input-number>

        </x-form.content>
    </x-form.form>

</x-app-layout>
