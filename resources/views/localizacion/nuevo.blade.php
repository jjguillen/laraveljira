<x-app-layout>

    <x-form.form action="/admin/localizaciones">
        <x-form.header>Nueva localización</x-form.header>
        <x-form.content route-for-cancel="/admin/localizaciones">

            <x-form.form-group>
                <x-form.input-text id="ciudad" name="ciudad">Ciudad</x-form.input-text>
                <x-form.input-text id="nombre_edificio" name="nombre_edificio">Nombre edificio</x-form.input-text>
            </x-form.form-group>

            <x-form.form-group>
                <x-form.input-text id="direccion_edificio" name="direccion_edificio">Dirección edificio
                </x-form.input-text>
                <x-form.input-number id="numero_sala" name="numero_sala">Numero de sala</x-form.input-number>
            </x-form.form-group>

            <x-form.input-textarea id="" name="">Descripcion</x-form.input-textarea>

            <x-form.input-file id="" name=""></x-form.input-file>

            <x-form.input-select id="" name="">Estado
                <x-slot name="options">
                    <option value="0">Selecciona...</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                </x-slot>
            </x-form.input-select>

        </x-form.content>
    </x-form.form>

</x-app-layout>
