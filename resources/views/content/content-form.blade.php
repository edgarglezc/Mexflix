@extends('layouts.temp')

@section('media')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Agregar Contenido</h2>

<div>
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:bg-orange-500"
        href="{{ route('content.index') }}">
        Regresar al listado de contenido
    </a>
</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-6">

    @include('partials.form-errors') 
    @if(isset($content))
    {{-- Edición de contenido --}}
    <form action="{{route('content.update', $content)}}" method="POST">
        @method('PATCH') {{-- Esto para cumplir con el estandar --}}
        @else
        {{-- Creación de contenido --}}
        <form action="{{route('content.store')}}" method="POST">
            @endif
            @csrf {{-- Token requerido para el envío del formulario --}}

            <label for="name" class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                <input type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Escribe el nombre del contenido..." name="name" id="name"
                    value="{{$content->name ?? ''}}" />
            </label>

            <label for="description" class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descripción</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Escribe la descripción del contenido..." name="description"
                    id="description">{{$content->description ?? ''}}</textarea>
            </label>

            <label for="is_serie" class="py-4 flex items-center dark:text-gray-400">
                <span class="text-gray-700 dark:text-gray-400 mr-2">Serie</span>
                <input type="checkbox"
                    class="form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray dark:text-orange-500"
                    name="is_serie" id="is_serie" />
            </label>

            <label for="duration" class="block text-sm" id="duration_label">
                <span class="text-gray-700 dark:text-gray-400">Duration</span>
                <input type="number"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="duration" id="duration" value="{{$content->duration ?? ''}}" />
            </label>

            <label for="year" class="block text-sm" id="year_label">
                <span class="text-gray-700 dark:text-gray-400">Año</span>
                <input type="number"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="year" id="year" value="{{$content->year ?? ''}}" />
            </label>            

            <label for="image_path" class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Enlace de la imagen</span>
                <input type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Escribe el nombre del contenido..." name="image_path" id="image_path"
                    value="{{$content->image_path ?? ''}}" />
            </label>

            <label for="link_path" class="block text-sm" id="link_path_label">
                <span class="text-gray-700 dark:text-gray-400">Enlace del contenido</span>
                <input type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Escribe el nombre del contenido..." name="link_path" id="link_path"
                    value="{{$content->link_path ?? ''}}" />
            </label>

            <div class="py-4">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:bg-orange-500">
                    <span>Agregar contenido</span>
                    <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                        <path
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </form>
    </form>
    <script>
        $(document).ready(function() {
            $('#is_serie').on('click', function(){
                var checked = $('#is_serie').val();
                // $("#is_serie").is(':checked')
                if ($("#is_serie").is(':checked')) {
                    $("#duration_label").hide();
                    $("#year_label").hide();
                    $("#link_path_label").hide();
                } 
                else {
                    $("#duration_label").show();
                    $("#year_label").show();
                    $("#link_path_label").show();
                }
            });
        });
    </script>
</div>
@endsection
