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

    <x-form.form action="/admin/localizaciones/{{ $localizacion->id }}">
        @method('PUT')
        <x-form.header>Editar localización</x-form.header>
        <x-form.content route-for-cancel="/admin/localizaciones">

            <x-form.input-text name="ciudad" value="{{ $localizacion->ciudad }}">Ciudad</x-form.input-text>
            <x-form.input-text name="nombre_edificio" value="{{ $localizacion->nombre_edificio }}">Nombre edificio
            </x-form.input-text>
            <x-form.input-text name="direccion_edificio" value="{{ $localizacion->direccion_edificio }}">Dirección
                edificio
            </x-form.input-text>
            <x-form.input-number name="numero_sala" value="{{ $localizacion->numero_sala }}">Numero de sala
            </x-form.input-number>


        </x-form.content>
    </x-form.form>

</x-app-layout>
