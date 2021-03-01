<x-app-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-form.form action="/admin/localizaciones">
        <x-form.header>Nueva localización</x-form.header>
        <x-form.content route-for-cancel="/admin/localizaciones">

            <x-form.input-text name="ciudad">Ciudad</x-form.input-text>
            <x-form.input-text name="nombre_edificio">Nombre edificio</x-form.input-text>
            <x-form.input-text name="direccion_edificio">Dirección edificio
            </x-form.input-text>
            <x-form.input-number name="numero_sala">Numero de sala</x-form.input-number>

            <x-form.input-textarea name="descripc">Descripcion</x-form.input-textarea>

            <x-form.input-file name="randomfile"></x-form.input-file>

            <x-form.input-select name="estado">Estado
                <x-slot name="options">
                    <option value="0">Selecciona...</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </x-slot>
            </x-form.input-select>

        </x-form.content>
    </x-form.form>

</x-app-layout>
